#import "cocos2d.h"
#import "Box2D.h"

@interface PlayScene : CCLayer {
    b2World *world;
    b2Body *groundBody;
    b2Body *paddleBody;    
    b2Fixture *paddleFixture;
    b2Fixture *ballFixture;
    b2Fixture *bottomFixture;
    b2MouseJoint *mouseJoint;
	

	
}


+ (id) scene;

@end
