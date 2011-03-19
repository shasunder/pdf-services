//
//  Bridge.h
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Edge.h"
#import "Pile.h"
#import "Vertex.h"
@interface Bridge : NSObject {
	
	NSMutableArray *edges;
	NSMutableArray *vertices;
	NSMutableArray *piles;
}

@property (nonatomic, retain) NSMutableArray *edges;
@property (nonatomic, retain) NSMutableArray *piles;
@property (nonatomic, retain) NSMutableArray *vertices;

//Edge
-(Edge *)addEdge:(CGPoint) start: (CGPoint) end;
-(BOOL)containsEdge:(Edge *)Edge;
-(void)removeEdge:(Edge *)Edge;
-(void)removeEdges:(CGPoint) start: (CGPoint) end;
-(NSMutableArray *) getEdges;

//piles
-(Pile *)addPile:(CGPoint) location;
-(void)removePile:(CGPoint) location;
-(NSMutableArray *)getPiles;

//vertices
-(void)addVertexEdge:(Edge *) edge;
-(BOOL)containsVertex:(CGPoint )point;
-(void)removeVertex:(CGPoint )point;
-(Vertex *)getVertex:(CGPoint) point;

@end
