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


-(id) init{
	
	if( (self=[super init] )) {
		self.edges = [[NSMutableArray alloc]init];
		
	}
	
	return self;
}

//Edge
-(Edge *)addEdge:(CGPoint) start: (CGPoint) end: (NSString *) material{

	Edge *edge = [[Edge alloc] initWithPoint:start : end];
	edge.material = material;
	[edges addObject:edge];
	
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


@end
