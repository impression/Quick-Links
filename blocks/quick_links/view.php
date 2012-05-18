<div id="addLink" class="modal hide fade" style="display: none; ">
	<form method="POST" class="form-horizontal" action="<?=$this->action('add_link', '#survey-form-'.$controller->bID)?>">
	<div class="modal-header">
	    <a class="close" data-dismiss="modal">×</a>
	    <h3>Link toevoegen</h3>
	  </div>
	  <div class="modal-body">
	      <fieldset>
	        <div class="control-group">
	          <label class="control-label" for="name">Naam</label>
	          <div class="controls">
	            <input type="text" class="input-large" required="required" id="name" name="name" placeholder="bijv. Google" />
	          </div>
	        </div>
	        <div class="control-group">
	          <label class="control-label" for="url">Link</label>
	          <div class="controls">
	            <input type="text" class="input-large" required="required" id="url" name="url" placeholder="bijv. http://www.google.com" />
	          </div>
	        </div>
	      </fieldset>
	  </div>
	  <div class="modal-footer">
	    <a onclick="$('#addLink').modal('hide')" class="btn"><?=t('Close')?></a>
	    <input type="submit" class="btn btn-primary" value="<?=t('Save changes')?>" />
	  </div>
	</form>
</div>
<?php
foreach($rows as $row){
	echo '<li><a href="'.$row['url'].'">> '.$row['name'].'</a>';
}
// href="'.$this->action('add_link').'"
echo '<li><a href="#addLink" onclick="$(\'#addLink\').modal()">+ ';
echo t('Add a link');
echo '</a>';
?>