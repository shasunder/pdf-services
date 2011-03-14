//
//  Joint.h
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//


@interface Joint : NSObject {
	CGPoint start;
	CGPoint end;
	NSString *material;
}
@property (nonatomic) CGPoint start;
@property (nonatomic) CGPoint end;
@property (nonatomic, retain) NSString *material;


@end
