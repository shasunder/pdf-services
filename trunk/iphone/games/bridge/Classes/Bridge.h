//
//  Bridge.h
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Edge.h"

#import "Vertex.h"
@interface Bridge : NSObject {
	
	NSMutableArray *edges;
	NSMutableArray *piles;
	NSMutableArray *vertices;
}

@property (nonatomic, retain) NSMutableArray *piles;
@property (nonatomic, retain) NSMutableArray *vertices;
@property (nonatomic, retain) NSMutableArray *edges;

//Edge
-(Edge *)addEdge:(CGPoint) start: (CGPoint) end;
-(NSMutableArray *) getEdges;
-(void)removeEdges:(CGPoint) start: (CGPoint) end;

//piles
-(void)addPile:(CGPoint) location;
-(void)removePile:(CGPoint) location;
-(NSMutableArray *)getPiles;

//vertices
-(void)addVertexEdge:(Edge *) edge;
-(BOOL)containsVertex:(CGPoint )point;
-(void)removeVertex:(CGPoint )point;
-(Vertex *)getVertex:(CGPoint) point;

@end
