package devarai.tools.db {
	import devarai.common.ui.IContentElement;
	import devarai.common.ui.menu.Menu;
	import devarai.common.ui.menu.MenuRow;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	
	/**
	 * This method hold and handles the adim GUI.
	 */
	public class Controls extends MovieClip {

		/**
		 * Link to main class.
		 */
		private var sc:Admin;
		
		/**
		 * A list with the present custom dictionaries.
		 */
		private var _menu:Menu;
		/**
		 * This is the selected custom dictionary.
		 */
		private var aktElement:IContentElement;
		
		/**
		 * Constructor.
		 */
		public function Controls(ad:Admin) {
			
			this.sc = ad;
			
			sc.controller.addEventListener("refreshTable",refresh);
			
			_menu = new Menu(150,256,selFct, MenuRow);
			
			this.addChild(_menu);
			
			_menu.x = 0;
			_menu.y = 20;
			
			sc.controller.addEventListener("refresh", action);
			
			clear_mc.text.text="Clear";
			clear_mc.addEventListener("interaction", clear);
			addActListeners();
		}
		
		/**
		 * Clears the contents of the dict input text fields.
		 */
		private function clear(evt:Event):void {
			create_txt.text = "";
			create_des_txt.text = "";
		}
		
		/**
		 * Adds the button listeners to the stage.
		 */
		private function addActListeners():void {

			createDict_mc.addEventListener("interaction", create);
			del_mc.addEventListener("interaction",del);
			insert_mc.addEventListener("interaction",insert);
			search_mc.addEventListener("interaction",search);

		}
		
		/**
		 * Temporarily removes the button action listeners.
		 */
		private function removeActListeners():void {
			createDict_mc.removeEventListener("interaction", create);
			del_mc.removeEventListener("interaction",del);
			insert_mc.removeEventListener("interaction",insert);
			search_mc.removeEventListener("interaction",search);
		}
		
		/**
		 * Called if someone selects a custom dict.
		 */
		private function selFct(e:IContentElement):void {
			
			_menu.markRed(e);
			aktElement = e;
			
			create_txt.text = e.info;
			descr_txt.text = (e as Dic).desc;
			create_des_txt.text = (e as Dic).desc;
			
		}
		
		/**
		 * Triggered if someone wants to create a new custom dict.
		 */
		private function create(evt:Event):void {
			
			if (create_txt.length < 3) {
			   status_txt.text = "!! Cannot create dict because the given name is not valid (maybe to short)";
			   return;
			}
			
			removeActListeners();
			
					
			sc.controller.createInsert(Init.pw,create_txt.text,null,create_des_txt.text);
			
		}
		
		/**
		 * Triggered to search for a word in a custom dict.
		 */
		private function search(evt:Event):void {
			
			if (search_txt.length < 1) {
				search_txt.text = "Cannot search because there is no word given";
				return;
			}
			
			if (!this.aktElement) {
				status_txt.text = "Cannot insert because there is no custom dict selected";
				return;
			}

			removeActListeners();
			
			
			sc.controller.search(Init.pw,this.aktElement.info,search_txt.text);
			
		}
		
		/**
		 * Triggered to insert a new word into the selected dict.
		 */
		private function insert(evt:Event):void {
			
			if (insert_txt.length < 1) {
				status_txt.text = "Cannot insert because there is no word given";
				return;
			}
			
			if (!this.aktElement) {
				status_txt.text = "Cannot insert because there is no custom dict selected";
				return;
			}
			
			removeActListeners();
			
			
			trace("inserting");
			
			sc.controller.createInsert(Init.pw,this.aktElement.info,insert_txt.text);
			
		}

		/**
		 * Deletes the selected dict from the database.
		 */
		private function del(evt:Event):void {
			
			if (!aktElement) {
				status_txt.text = "No custom dict selected for deletion!";
				return;
			}
			
			
			removeActListeners();
			
			
			sc.controller.del(Init.pw,aktElement.info);
			
		}

		/**
		 * A user backend operation got executed. This is triggered afterwards.
		 */
		private function action(evt:Event):void {
			status_txt.text = sc.controller.status;
			addActListeners();
			sc.controller.refreshDicts(Init.pw);
		}
		
		
		/**
		 * Refreshes the custom dict list.
		 */
		private function refresh(evt:Event):void {
			_menu.clear();
			
			var i:int = 0;
			
			var found:Boolean = false;
			
			for (i = 0; i<sc.controller.myTables.length; i++) {
				var row:IContentElement = new Dic(i+1,sc.controller.myTables[i][0],sc.controller.myTables[i][1]);
				if (this.aktElement) {
					if (this.aktElement.info == row.info) {
						this.aktElement = row;
						found = true;
					}	
				}
					
				_menu.addWord(row);
			}
			
			if (!found) {
				this.aktElement = null;
			} else {
				_menu.markRed(this.aktElement);
			}
			
			if (i==0) {
				none();
			} else {
				
			}
		}
		
		
		/**
		 * Triggered if there is not custom dicts yet.
		 */
		private function none():void {
			status_txt.text = "Sorry. There are no custom tables available.";
		}
		
		
	}
	
	
}