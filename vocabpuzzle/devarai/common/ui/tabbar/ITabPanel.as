package  devarai.common.ui.tabbar {
	
	import flash.display.MovieClip;
	
	import devarai.common.ui.tabbar.ITabBar;
	
	/**
	 * Panel interface.
	 */
	public interface ITabPanel {
		
		/**
		 * Sets the tab bar.
		 */
		function set tabBar(v:ITabBar):void;
		/**
		 * Gives the tab bar.
		 */
		function get tabBar():ITabBar;
		
		/**
		 * Gives the title.
		 */
		function get titel():String;
		/**
		 * Sets the title.
		 */
		function set titel(t:String):void;
		
		/**
		 * Inits the panel with some parameters.
		 */
		function init(param:Object=null):void;
		
		/**
		 * De-initializes the panel.
		 */
		function deInit():void;
		
		/**
		 * Executed when the panel is shown.
		 */
		function onShow():void;
		/**
		 * Executed when the panel hides.
		 */
		function onHide():void;
		/**
		 * Does a roll back.
		 */
		function rollBack():void;
		/**
		 * Persists the panel state
		 */
		function save():void;
		/**
		 * Restores the panel state
		 */
		function restore():void;

	}
	
	
	
}