package devarai.tools.db {
	import fl.transitions.Tween;
	import fl.transitions.easing.None;
	
	import flash.display.Bitmap;
	import flash.display.BitmapData;
	import flash.display.DisplayObject;
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.ContextMenuEvent;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.filters.BlurFilter;
	import flash.filters.ColorMatrixFilter;
	import flash.geom.Matrix;
	import flash.media.Sound;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.net.navigateToURL;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.ui.ContextMenu;
	import flash.ui.ContextMenuItem;
	import flash.utils.Dictionary;
	import flash.xml.XMLDocument;
	

	/**
	 * This is the main class for the admin panel for setting up custom dictionaries and so.
	 */
	public class Admin extends MovieClip {
		
		/**
		 * Entities used for loading and handling the external XML file with the puzzle parameters.
		 */
		private var _loader:URLLoader = new URLLoader();
		private var _request:URLRequest;
		private var _xml:XML = null;

		/**
		 * Path to the back-end
		 */
		private var _phpPath:String;
		public function get phpPath():String {
			return this._phpPath;
		}
		
		private var theWidth:Number;
		private var theHeight:Number;
		
		/**
		 * Controller
		 */
		
		private var _control:Controller;
		
		public function get controller():Controller {
			return this._control;
		}
		private var init:Init;
		private var control:Controls;

		/**
		 * Constructor.
		 */
		public function Admin(wid:Number, hei:Number) {
			
		this.theHeight = hei;
		this.theWidth = wid;
		
		this._control = new Controller(this);
		
		_request = new URLRequest("admin.xml");
		
		this.control = new Controls(this);
			
			
		_loader.load(_request);
		_loader.addEventListener(Event.COMPLETE, loadComplete, false, 0, true);
		}
		
		/**
		 * Called if the Puzzle XML is loaded.
		 */
		private function loadComplete(e:Event):void {
			if (e!=null) _xml= new XML(e.target.data);
			
			// Read in the XML data
			
			
			
			var pa:String = _xml.php.text();
			
			this._phpPath = pa;
			
			if (pa.length>0 && pa.charAt(pa.length-1)!="/") {
				this._phpPath+="/";
			} 
			
			
			init = new Init(this);
			
			this.addChild(init);
			init.x = 0;
			init.y = 0;
			
			init.addEventListener("loggedIn", startControls);
			
		}
		
		/**
		 * User logged in.
		 */
		private function startControls(evt:Event):void {
			
			this.addChild(control);
			
			control.y = -155;
			control.x = -285;
			
		}
		

		
		
	}
	

}