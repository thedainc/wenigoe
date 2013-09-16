package {
	import devarai.games.vocabularyPuzzle.VocabularyPuzzle;
	
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.LoaderInfo;
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.PerspectiveProjection;
	import flash.geom.Point;
	
	public class VocabularyPuzzleMain extends MovieClip {
		
		var sp:VocabularyPuzzle;
		
		public function VocabularyPuzzleMain() {
					
			if (stage!=null) {
				init(null);				
			} else {
				this.addEventListener(Event.ADDED_TO_STAGE,init);
			}
		}
		
		private var tw:Tween;
		
		private function init(evt:Event):void {
			
			
			startField.visible = false;
			
			var params:Object = LoaderInfo(this.root.loaderInfo).parameters;
			
			var puzzleUrl:String = params["puzzleUrl"];
			
			if (!puzzleUrl) {
				puzzleUrl = "demopuzzle.xml";
 			}
		
			sp = new VocabularyPuzzle(stage.stageWidth, stage.stageHeight-42,puzzleUrl);
			this.addChild(sp);
			sp.y = 35;
			stage.addEventListener(Event.RESIZE, resize);
					

			
			resize(null);
		}
		
		private function resize(evt:Event):void {
			background_mc.x = 0;
			background_mc.y = 0;
			background_mc.width = stage.stageWidth;
			background_mc.height = stage.stageHeight;
			top_mc.width= stage.stageWidth+40;
			sp.x = stage.stageWidth/2-sp.width/2;
			sp.y = 40+(stage.stageHeight-40)/2-sp.height/2;

			
		}
		
	}
	
}