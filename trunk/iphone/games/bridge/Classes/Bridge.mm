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
@synthesize edges;
@synthesize vertices;

-(id) init{
	
	if( (self=[super init] )) {
		self.edges = [[NSMutableArray alloc]init];
		self.vertices = [[NSMutableArray alloc]init];
	}
	
	return self;
}

//Edge
-(Edge *)addEdge:(CGPoint) start: (CGPoint) end: (NSString *) material{

	Edge *edge = [[Edge alloc] initWithPoint:start : end];
	edge.material = material;
	[edges addObject:edge];
	[self addVertexEdge:edge];
	
	return edge;

}

-(BOOL)containsEdge:(Edge *)Edge{
	return [edges containsObject:Edge ];
}

-(void)removeEdges:(CGPoint) start: (CGPoint) end{
	//loop through edgesedges array and remove edges falling between start and end positions.
	for (int i=0; i< [edges count]; i++) {
		Edge *Edge = [edges objectAtIndex:i];
		CGPoint startEdge = Edge.start;
		CGPoint endEdge = Edge.end;
		int x1 = startEdge.x, y1 = startEdge.y, x2 = endEdge.x, y2 = endEdge.y;
		
		int xs = start.x, ys = start.y, xe = end.x, ye = end.y;

		if( xs > xe) { //swap
			xs= xe; xe =xs;
		}
		if(ys > ye){
			ys = ye ; ye=ys;
		}
		
		if(x1 >= xs && y1 >=ys && x2 <=xe && y2 <= ye){ //lines intersect. remove
			[edges removeObject:Edge ];		
		}
		
	}
	
}

-(void)removeEdge:(Edge *)Edge{
	[edges removeObject:Edge ];
	
}
-(NSMutableArray *) getEdges{
	return edges;
}

-(NSMutableArray *) getVertices{
	return vertices;
}

//piles
-(Pile *)addPile:(CGPoint) location{
	Pile *pile =[[Pile alloc] init:location ];
	[piles addObject:pile];
}

-(void)removePile:(Pile *) pile{
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
