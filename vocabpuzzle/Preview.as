package {
		
		import flash.display.Loader;
		import flash.display.MovieClip;
		import flash.events.Event;
		import flash.events.EventDispatcher;
		import flash.events.ProgressEvent;
		import flash.net.URLRequest;
		
		/**
		 * Basically this is nothing but a preloader.
		 */
		public class Preview extends MovieClip {
			
			private var ldr:Loader;
			private var jigsaw:MovieClip;
			
			/**
			 * Constructor.
			 */
			public function Preview() {
				
				ldr = new Loader();
				var url:String = "vocabularyPuzzle.swf";
				var urlReq:URLRequest = new URLRequest(url);
				
				//bar.show();
				ldr.contentLoaderInfo.addEventListener("complete",continueCreation2);
				ldr.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS,progressSet);
				ldr.load(urlReq);

				resize(null);
				
				stage.addEventListener(Event.RESIZE, resize);
							
			}
			/**
			 * Stage resize hook.
			 */
			private function resize(evt:Event):void {
				background_mc.x = 0;
				background_mc.y = 0;
				background_mc.width = stage.stageWidth;
				background_mc.height = stage.stageHeight;
				top_mc.width= stage.stageWidth+40;
				preloader.x = stage.stageWidth/2;
				preloader.y = 40+(stage.stageHeight-40)/2;
			}

			private function progressSet(evt:ProgressEvent):void {
			}
			
			private function continueCreation2(evt:Event):void  {
	
			
				jigsaw = evt.currentTarget.content as MovieClip; 
				
				this.addChild(jigsaw);
				
			}
						
			
		}
		
		
		
}