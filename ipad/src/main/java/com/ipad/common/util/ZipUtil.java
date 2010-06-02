package com.ipad.common.util;

import java.awt.image.BufferedImage;
import java.io.IOException;
import java.util.Iterator;
import java.util.Map;
import java.util.Set;
import java.util.Map.Entry;
import java.util.zip.ZipFile;

import javax.imageio.ImageIO;

import org.apache.commons.compress.zip.ZipEntry;
import org.apache.commons.compress.zip.ZipOutputStream;

public class ZipUtil {

	public static ZipFile readZipFile(String location) {
		ZipFile z = null;
		try {
			z = new ZipFile(location);
		} catch (IOException e) {
			throw new RuntimeException(e);
		}
		return z;
	}


	public static void writeZipFile(ZipOutputStream zo, Map<String, BufferedImage> files) {
		Set<Entry<String, BufferedImage>> entrySet = files.entrySet();
		try {
			for (Iterator<Entry<String, BufferedImage>> iter = entrySet.iterator(); iter.hasNext();) {
				Map.Entry<String, BufferedImage> entry = iter.next();
				String zipFileName = entry.getKey();
				BufferedImage imageFile = entry.getValue();

				ZipEntry zEntry = new ZipEntry(zipFileName);
				String formatName= zipFileName.substring(zipFileName.lastIndexOf(".")+1, zipFileName.length());

				zEntry.setMethod(ZipEntry.DEFLATED);
				zo.putNextEntry(zEntry);
				ImageIO.write(imageFile, formatName, zo);

			}
		} catch (IOException e) {
			throw new RuntimeException(e);
		} finally {
			try {
				zo.close();
			} catch (IOException e) {
				throw new RuntimeException(e);
			}
		}
	}
}
