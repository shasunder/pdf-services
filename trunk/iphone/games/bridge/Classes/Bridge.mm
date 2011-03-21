//
//  Bridge.m
//  bridge
//
//  Created by sandeep m on 06/03/2011.
//  Copyright 2011 bri. All rights reserved.
//

#import "Bridge.h"


@implementation Bridge

@synthesize piles;
@synthesize vertices;

-(id) init{
	
	if( (self=[super init] )) {
		self.vertices = [[[NSMutableArray alloc]init] retain];
		self.piles = [[[NSMutableArray alloc]init] retain];
	
	}
	
	return self;
}

//Edge
-(Edge *)addEdge:(CGPoint) start: (CGPoint) end: (NSString *) material{

	Edge *edge = [[Edge alloc] initWithPoint:start : end];
	edge.material = material;
	//[edges addObject:edge];
	[self addVertexEdge:edge];
	
	return edge;

}

-(void)removeEdges:(CGPoint) start: (CGPoint) end{
	//get the edges and remove.
	NSMutableArray *edges = [self getEdges];
	for (int i=0; i< [edges count]; i++) {
		Edge *edge = [edges objectAtIndex:i];
		//remove edge if its points fall within range
	}
}

-(NSMutableArray *) getEdges{
	NSMutableArray *edges = [[NSMutableArray alloc] init];
	
	for (int i=0; i< [vertices count]; i=i++) {
		Vertex *vertex = [vertices objectAtIndex:i];
		for (int j=0; j< [vertex.edges count]; j++) {
			[edges addObject:[vertex.edges objectAtIndex:j] ];
		}
		
	}
	return edges;
}

-(NSMutableArray *) getVertices{
	return vertices;
}

//piles
-(void)addPile:(CGPoint) location{
	Vertex *pile =[[[Vertex alloc] init] retain];
	pile.point = location;
	pile.isPile =YES;
	//[vertices addObject:pile];
	[piles addObject:pile];
}

-(void)removePile:(Vertex *) pile{
	[piles removeObject:pile ];
}
-(NSMutableArray *)getPiles{
	return piles;
}

//vertex


-(void)addVertexEdge:(Edge *) edge{
	Vertex *vertexStart = [self getVertex:edge.start];
	
	if(vertexStart==NULL){
		vertexStart = [[[Vertex alloc]init] retain];
		vertexStart.point = edge.start;
	}
	
	[vertexStart.edges addObject:edge];
	
	Vertex *vertexEnd = [self getVertex:edge.end];
	
	if(vertexEnd==NULL){
		vertexEnd = [[Vertex alloc]init];
		vertexEnd.point = edge.end;
	}
	
	[vertexEnd.edges addObject:edge];
	
	[vertices addObject:vertexStart];
	[vertices addObject:vertexEnd];
	
	
}

-(BOOL)isVertexEqual:(Vertex *)vertex : (CGPoint) point{
	return vertex.point.x == point.x && vertex.point.y == point.y;
}

-(BOOL)containsVertex:(CGPoint )point{
	for (int i=0; i< [vertices count]; i++) {
		Vertex *vertex = [vertices objectAtIndex:i];
		if([self isVertexEqual : vertex : point]){
			return YES;
		}
	}
	return NO;
}

-(void)removeVertex:(CGPoint )point{
	for (int i=0; i< [vertices count]; i++) {
		Vertex *vertex = [vertices objectAtIndex:i];
		if([self isVertexEqual : vertex : point]){
			[vertices removeObjectAtIndex:i];
			break;
		}
	}
}


-(Vertex *)getVertex:(CGPoint) point{
	for (int i=0; i< [vertices count]; i++) {
		Vertex *vertex = [vertices objectAtIndex:i];
		if([self isVertexEqual : vertex : point]){
			return vertex;
		}
	}
	return NULL;
}


@end
