package com.ipad.common.util;

import org.jpedal.PdfDecoder;
import org.jpedal.color.ColorSpaces;
import org.jpedal.constants.PageInfo;
import org.jpedal.io.JAIHelper;
import org.jpedal.objects.PdfFileInformation;
import org.jpedal.utils.LogWriter;

import java.awt.*;
import java.awt.image.BufferedImage;
import java.io.File;
import java.util.Iterator;

/**
 * This example opens a pdf file and extracts the images version of each
 * page which it saves as an image scaled to users specification
 */
public class JpedalExtractPagesAsThumbnails {

    boolean isTransparent=false;

  private String user_dir = System.getProperty("user.dir");
  
  /**use 72 dpi as default*/
  private int dpi=72;

  /**flag to show if we print messages*/
  public static boolean outputMessages = false;

  String outputDir=null;

  String separator = System.getProperty("file.separator");

  /**the decoder object which decodes the pdf and returns a data object*/
  PdfDecoder decodePdf = null;

  //type of image to save thumbnails
  private String format = "png";
  
  /** holding all creators that produce OCR pdf's */
  private String[] ocr = {"TeleForm"};

  /**flag to show if using images at highest quality -switch on with command line flag Dhires*/
  private boolean useHiresImage=false;

  /**sample file which can be setup - substitute your own. 
   * If a directory is given, all the files in the directory will be processed*/
  private String test_file = "/mnt/shared/sample_pdfs/general/World Factbook.pdf";

  /**used as part of test to limit pages to first 10*/
  public static boolean isTest=false;
  
  /**scaling to use - default is 100 percent*/
  private int scaling=100;
  
  /**file password or null*/
  private String password=null;

    //only used if between 0 and 1
    private float JPEGcompression=-1f;


    /**
     * constructor to provide same functionality as main method
     *
     * Full details at http://www.jpedal.org/support_egEPT.php      
     */
  public JpedalExtractPagesAsThumbnails(String[] args) {

        //read all values passed in by user and setup
        String fileName = setParams(args);

        //check file exists
    File pdfFile = new File(fileName);

    //if file exists, open and get number of pages
    if (!pdfFile.exists()) {
      System.out.println("File " + pdfFile + " not found");
      System.out.println("May need full path");

      return;
    }

        extraction(fileName, outputDir);

  }

  private void extraction(String fileName, String outputDir) {
    //get any user set dpi
    String userDpi=System.getProperty("org.jpedal.dpi");
    if(userDpi!=null){
      try{
        
        dpi=Integer.parseInt(userDpi);
        
      }catch(Exception e){
        throw new RuntimeException("Problem with value "+userDpi+" (must be integer)");
      }
    }
    
    //get any user set dpi
    String hiresFlag = System.getProperty("org.jpedal.hires");
    if(PdfDecoder.hires || hiresFlag != null){
      useHiresImage=true;
    }
    
    this.outputDir=outputDir;
    //check output dir has separator
    if (user_dir.endsWith(separator) == false)
      user_dir = user_dir + separator;

    /**
     * if file name ends pdf, do the file otherwise 
     * do every pdf file in the directory. We already know file or
     * directory exists so no need to check that, but we do need to
     * check its a directory
     */
    if (fileName.toLowerCase().endsWith(".pdf")) {
      
      if(!JpedalExtractPagesAsThumbnails.isTest && outputDir==null)
      outputDir=user_dir + "thumbnails" + separator;
      
      decodeFile(fileName,outputDir);
    } else {

      /**
       * get list of files and check directory
       */

      String[] files = null;
      File inputFiles = null;

      /**make sure name ends with a deliminator for correct path later*/
      if (!fileName.endsWith(separator))
        fileName = fileName + separator;

      try {
        inputFiles = new File(fileName);

        if (!inputFiles.isDirectory()) {
          System.err.println(
            fileName + " is not a directory. Exiting program");
                    
        }else
        files = inputFiles.list();
      } catch (Exception ee) {
        LogWriter.writeLog(
          "Exception trying to access file " + ee.getMessage());
        
      }

            if(files!=null){
                /**now work through all pdf files*/
                long fileCount = files.length;

                for (int i = 0; i < fileCount; i++) {

                    if (files[i].toLowerCase().endsWith(".pdf")) {
                        if (outputMessages)
                            System.out.println(fileName + files[i]);

                        decodeFile(fileName + files[i],outputDir);
                    }
                }
            }
    }

    /**tell user*/
    if(outputMessages)
    System.out.println("Thumbnails created");
  }

  /**
   * routine to decode a file
   */
  private void decodeFile(String fileName,String outputDir) {
    
    /**get just the name of the file without 
     * the path to use as a sub-directory
     */
    
    String name = "demo"; //set a default just in case
    
    int pointer = fileName.lastIndexOf(separator);
    
    if(pointer==-1)
      pointer = fileName.lastIndexOf('/');
    
    if (pointer != -1){
      name = fileName.substring(pointer + 1, fileName.length() - 4);
    }else if((!JpedalExtractPagesAsThumbnails.isTest)&&(fileName.toLowerCase().endsWith(".pdf"))){
      name=fileName.substring(0,fileName.length()-4);
    }
    
    //create output dir for images
    if(outputDir==null)
      outputDir = user_dir + "thumbnails" + separator ;
    System.out.println("outputDir : "+outputDir);
    //PdfDecoder returns a PdfException if there is a problem
    try {
      decodePdf = new PdfDecoder(true);

            /**optional JAI code for faster rendering*/
            //org.jpedal.external.ImageHandler myExampleImageHandler=new org.jpedal.examples.handlers.ExampleImageDrawOnScreenHandler();
            //decode_pdf.addExternalHandler(myExampleImageHandler, Options.ImageHandler);


             /**/
      
      /**
           * font mappings
           */
      if(!isTest){
            
        //mappings for non-embedded fonts to use
        PdfDecoder.setFontReplacements(decodePdf);
        
      }

            //<start-gpl>
      if(useHiresImage)
      decodePdf.useHiResScreenDisplay(true);
      //<end-gpl>
      
      //true as we are rendering page
      decodePdf.setExtractionMode(0, dpi,dpi/72);
      //don't bother to extract text and images
      
      /**
       * open the file (and read metadata including pages in  file)
       */
      if (outputMessages)
        System.out.println("Opening file :" + fileName+" at "+dpi+" dpi");
      
      if(password!=null)
        decodePdf.openPdfFile(fileName,password);
      else
        decodePdf.openPdfFile(fileName);
      
    } catch (Exception e) {
      
      System.err.println("8.Exception " + e + " in pdf code in "+fileName);      
    }
    
    /**
     * extract data from pdf (if allowed). 
     */
    if(decodePdf.isEncrypted() && !decodePdf.isFileViewable()){
      //exit with error if not test
      if(!isTest)
      throw new RuntimeException("Wrong password password used=>"+password+"<");
    }else if ((decodePdf.isEncrypted()&&(!decodePdf.isPasswordSupplied()))
        && (!decodePdf.isExtractionAllowed())) {
      throw new RuntimeException("Extraction not allowed");
    } else {

            //create a directory if it doesn't exist
            File output_path = new File(outputDir);
            if (!output_path.exists())
                output_path.mkdirs();

            String multiPageFlag=System.getProperty("org.jpedal.multipage_tiff");
            boolean isSingleOutputFile=multiPageFlag!=null && multiPageFlag.toLowerCase().equals("true");

            //allow user to specify value
            String rawJPEGComp=System.getProperty("org.jpedal.compression_jpeg");
            if(rawJPEGComp!=null){
                try{
                    JPEGcompression=Float.parseFloat(rawJPEGComp);
                }catch(Exception e){
                    e.printStackTrace();
                }
                if(JPEGcompression<0 || JPEGcompression>1)
                    throw new RuntimeException("Invalid value for JPEG compression - must be between 0 and 1");

            }

            String tiffFlag=System.getProperty("org.jpedal.compress_tiff");
            String jpgFlag=System.getProperty("org.jpedal.jpeg_dpi");
            boolean compressTiffs = tiffFlag!=null && tiffFlag.toLowerCase().equals("true");

            if(JAIHelper.isJAIused())
                JAIHelper.confirmJAIOnClasspath();

            //page range
            int start = 1,  end = decodePdf.getPageCount();

            //limit to 1st ten pages in testing
            if((end>10)&&(isTest))
                end=10;

            /**
             * extract data from pdf and then write out the pages as images
             */

            if (outputMessages)
                System.out.println("Thumbnails will be in  " + outputDir);

            try {

                BufferedImage[] multiPages = new BufferedImage[1 + (end-start)];



                for (int page = start; page < end + 1; page++) { //read pages

                    if (outputMessages)
                        System.out.println("Page " + page);

                    String image_name;
                    if(isSingleOutputFile)
                        image_name =name+ '_' +dpi;
                    else
                        image_name =name+ '_' +dpi+"_page_" + page;

                    /**
                     * get PRODUCER and if OCR disable text printing
                     */
                    PdfFileInformation currentFileInformation=decodePdf.getFileInformationData();

                    String[] values=currentFileInformation.getFieldValues();
                    String[] fields=currentFileInformation.getFieldNames();

                    for(int i=0;i<fields.length;i++){

                        if(fields[i].equals("Creator")){

                            for(int j=0;j<ocr.length;j++){

                                if(values[i].equals(ocr[j])){

                                    decodePdf.setRenderMode(PdfDecoder.RENDERIMAGES);

                                }
                            }
                        }
                    }

                    /**
                     * get the current page as a BufferedImage
                     */
                    BufferedImage image_to_save =null;
                    if(!isTransparent)
                        image_to_save=decodePdf.getPageAsImage(page);
                    else{ //use this if you want a transparent image
                        image_to_save =decodePdf.getPageAsImage(page);

                                                 //java adds odd tint if you save this as JPEG which does not have transparency
                        // so put as RGB on white background
                        // (or save as PNG or TIFF which has transparency)
                        // or just call decode_pdf.getPageAsImage(page)
                        if(image_to_save!=null && format.toLowerCase().startsWith("jp")){

                            BufferedImage rawVersion=image_to_save;

                            int w=rawVersion.getWidth(), h=rawVersion.getHeight();
                            //blank canvas
                            image_to_save = new BufferedImage(w,h , BufferedImage.TYPE_INT_RGB);

                            //
                            Graphics2D g2 = image_to_save.createGraphics();
                            //white background
                            g2.setPaint(Color.WHITE);
                            g2.fillRect(0,0,w,h);
                            //paint on image
                            g2.drawImage(rawVersion, 0, 0,null);
                        }
                    }

                                         //if just gray we can reduce memory usage by converting image to Grayscale

                    /**
                     * see what Colorspaces used and reduce image if appropriate
                     * (only does Gray at present)
                     *
                     * null if JPedal unsure
                     */
                    Iterator colorspacesUsed=decodePdf.getPageInfo(PageInfo.COLORSPACES);

                    int nextID;
                    boolean isGrayOnly=colorspacesUsed!=null; //assume true and disprove
                    while(colorspacesUsed!=null && colorspacesUsed.hasNext()){
                        nextID=((Integer)(colorspacesUsed.next())).intValue();

                        if(nextID!= ColorSpaces.DeviceGray && nextID!=ColorSpaces.CalGray)
                            isGrayOnly=false;
                    }

                    //draw onto GRAY image to reduce colour depth
                    //(converts ARGB to gray)
                    if(isGrayOnly){
                        BufferedImage image_to_save2=new BufferedImage(image_to_save.getWidth(),image_to_save.getHeight(), BufferedImage.TYPE_BYTE_GRAY);
                        image_to_save2.getGraphics().drawImage(image_to_save,0,0,null);
                        image_to_save = image_to_save2;
                    }

                    //put image in array if multi-images
                    if(isSingleOutputFile)
                        multiPages[page-start] = image_to_save;

                    if (image_to_save == null) {
                        if (outputMessages)
                            System.out.println("No image generated - are you using client mode?");
                    } else {

                        /**BufferedImage does not support any dpi concept. A higher dpi can be created
                         * using JAI to convert to a higher dpi image*/

                        //shrink the page to 50% with graphics2D transformation
                        //- add your own parameters as needed
                        //you may want to replace null with a hints object if you
                        //want to fine tune quality.

                        /** example 1 biliniear scaling
                         AffineTransform scale = new AffineTransform();
                         scale.scale(.5, .5); //50% as a decimal
                         AffineTransformOp scalingOp =new AffineTransformOp(scale, null);
                         image_to_save =scalingOp.filter(image_to_save, null);

                         */

                        /** example 2 bicubic scaling - better quality but slower
                         to preserve aspect ratio set newWidth or newHeight to -1*/

                        /**allow user to specify maximum dimension for thumbnail*/
                        String maxDimensionAsString = System.getProperty("maxDimension");
                        int maxDimension = -1;

                        if(maxDimensionAsString != null)
                            maxDimension = Integer.parseInt(maxDimensionAsString);

                        if(scaling!=100 || maxDimension != -1){
                            int newWidth=image_to_save.getWidth()*scaling/100;
                            int newHeight=image_to_save.getHeight()*scaling/100;

                            Image scaledImage=null;
                            if(maxDimension != -1 && (newWidth > maxDimension || newHeight > maxDimension)){
                                if(newWidth > newHeight){
                                    newWidth = maxDimension;
                                    scaledImage= image_to_save.getScaledInstance(newWidth,-1,BufferedImage.SCALE_SMOOTH);
                                } else {
                                    newHeight = maxDimension;
                                    scaledImage= image_to_save.getScaledInstance(-1,newHeight,BufferedImage.SCALE_SMOOTH);
                                }
                            } else {
                                scaledImage= image_to_save.getScaledInstance(newWidth,-1,BufferedImage.SCALE_SMOOTH);
                            }

                            if(format.toLowerCase().startsWith("jp"))
                                image_to_save = new BufferedImage(scaledImage.getWidth(null),scaledImage.getHeight(null) , BufferedImage.TYPE_INT_RGB);
                            else
                                image_to_save = new BufferedImage(scaledImage.getWidth(null),scaledImage.getHeight(null) , BufferedImage.TYPE_INT_ARGB);

                            Graphics2D g2 = image_to_save.createGraphics();

                            g2.drawImage(scaledImage, 0, 0,null);
                        }

                        if ((jpgFlag != null || rawJPEGComp!=null) && format.startsWith("jp") && JAIHelper.isJAIused()) {

                            com.sun.image.codec.jpeg.JPEGImageEncoder jpegEncoder = com.sun.image.codec.jpeg.JPEGCodec.createJPEGEncoder(new java.io.FileOutputStream(outputDir + page + image_name + "." + format));
                            com.sun.image.codec.jpeg.JPEGEncodeParam jpegEncodeParam = jpegEncoder.getDefaultJPEGEncodeParam(image_to_save);

                            if (jpgFlag != null){

                                int dpi = 96;

                                try {
                                    dpi = Integer.parseInt(jpgFlag);
                                } catch (Exception e) {
                                    e.printStackTrace();
                                }

                                jpegEncodeParam.setDensityUnit(com.sun.image.codec.jpeg.JPEGEncodeParam.DENSITY_UNIT_DOTS_INCH);
                                jpegEncodeParam.setXDensity(dpi);
                                jpegEncodeParam.setYDensity(dpi);

                            }

                            if(JPEGcompression>=0 && JPEGcompression<=1f)
                                jpegEncodeParam.setQuality(JPEGcompression,false);
                            
                            jpegEncoder.encode(image_to_save, jpegEncodeParam);

                        } else {

                            //save image
                            decodePdf.getObjectStore().saveStoredImage(
                                    outputDir + page + image_name,
                                    image_to_save,
                                    true,
                                    false,
                                    format);
                        }
                        //if you just want to save the image, use something like
                        //javax.imageio.ImageIO.write((java.awt.image.RenderedImage)image_to_save,"png",new java.io.FileOutputStream(outputDir + page + image_name+".png"));

                    }

                    //flush images in case we do more than 1 page so only contains
                    //images from current page
                    decodePdf.flushObjectValues(true);
                    //flush any text data read

                }
            } catch (Exception e) {

                decodePdf.closePdfFile();
                throw new RuntimeException("Exception " + e.getMessage()+" with thumbnails on File="+fileName);
            }
        }
    
    /**close the pdf file*/
    decodePdf.closePdfFile();
    
  }
  //////////////////////////////////////////////////////////////////////////
  /**
   * main routine which checks for any files passed and runs the demo
     *
     * Full details at http://www.jpedal.org/support_egEPT.php
     * pdffiles png 50 would create thumbnails of PDF pages as png files at 50%
   */
  public static void main(String[] args) {


        System.out.println("Simple demo to extract images from a page");

        //check values first and exit with info if too many
        int count=args.length;
        boolean failed = count>4 || count==0;
        if(failed){

            if(count>0){
                System.out.println("too many arguments entered - run with no values to see defaults");

                String arguments="";
                for(int a=0;a<args.length;a++)
                    arguments=arguments+args[a]+ '\n';
                System.out.println("you entered:\n"+arguments+"as the arguments");
            }
            
      showCommandLineValues();
    }

        new JpedalExtractPagesAsThumbnails(args);
    
  }

    private String setParams(String[] args) {
        //set to default
        String fileName = test_file;

        //check user has passed us a filename and use default if none
        int len=args.length;
        if (len == 0){
            showCommandLineValues();
        }else if(len == 1){
            fileName = args[0];
        }else if(len <6){

            //input
            fileName = args[0];
            
            for(int j=1;j<args.length;j++){
                String value=args[j];
                boolean isNumber=isNumber(value);

                if(isNumber){
                    try{
                        scaling=Integer.parseInt(value);
                    }catch(Exception e){
                        throw new RuntimeException(value+" is not an integer");
                    }
                }else{
                    String in = value.toLowerCase();
                    if((in.equals("jpg"))||(in.equals("jpeg")))
                        format="jpg";
                    else if(in.equals("tif")||in.equals("tiff"))
                        format="tif";
                    else if(in.equals("png"))
                        format="png";
                    else{

                        //assume password if no / or \
                        if(value.endsWith("/") || value.endsWith("\\"))
                            outputDir=value;
                        else
                            password=value;


//            failed=true;
//            System.out.println("value args not recognised as valid parameter.");
//            System.out.println("please enter \"jpg\", \"jpeg\", \"tif\", \"tiff\" or \"png\".");
                    }
                }
            }
        }
        return fileName;
    }

    private static void showCommandLineValues() {
    System.out.println("Example can take 1-5 parameters");
    System.out.println("Value 1 is the file name or directory of PDF files to process");
    System.out.println("4 optional values of:-\nimage type (jpeg,tiff,png), \nscaling (100 = full size), \npassword for protected file (or null) can also be added ,\noutput path (must end with / or \\ character)");
    System.exit(0);
  }
  
  /**test to see if string or number*/
  private static boolean isNumber(String value) {
    
    //assume true and see if proved wrong
    boolean isNumber=true;
    
    int charCount=value.length();
    for(int i=0;i<charCount;i++){
      char c=value.charAt(i);
      if((c<'0')|(c>'9')){
        isNumber=false;
        i=charCount;
      }
    }
    
    return isNumber;
  }

  /**
   * @return Returns the outputDir.
   */
  public String getOutputDir() {
    return outputDir;
  }

}
 