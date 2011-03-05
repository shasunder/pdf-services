//
//  EditControlLayer.h
//  bridge
//
//  Created by sandeep m on 05/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "cocos2d.h"
#import "CocosUtility.h"

@interface EditControlLayer : CCLayer {
	CCScene *scene;
}
@property (nonatomic, retain) CCScene *scene;

-(void)setScene:(CCScene *)scene;
@end
