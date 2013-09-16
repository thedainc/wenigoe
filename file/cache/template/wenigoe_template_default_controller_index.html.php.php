<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:35 pm */ ?>
<div class="h3"><?php echo $this->_aVars['message']; ?></div>
<div class="h3"><?php echo $this->_aVars['type']; ?></div>
<div class="block" style="border:1px solid black;width:200px;float:left;">
    <div class="title" style="background-color: #DFE4EE"><center>My Bucketlist</center></div>
    <div class="content" style="margin-left:20px">

<?php if ($this->_aVars['aBucketlist']['item1']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item1']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item2']): ?>
        <li><?php echo $this->_aVars['aBucketlist']['item2']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item3']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item3']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item4']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item4']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item5']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item5']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item6']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item6']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item7']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item7']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item8']): ?>
            <li><?php echo $this->_aVars['aBucketlist']['item8']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aBucketlist']['item9']): ?>
             <li><?php echo $this->_aVars['aBucketlist']['item9']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aUserId']): ?>
            <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('wenigoe.form'); ?>"><strong>Update Bucketlist</strong></a>
<?php endif; ?>
    </div>
</div>

<div class="block" style="border:1px solid black;width:250px;margin-left:30px;float:left">
    <div class="title" style="background-color: #DFE4EE"><center>My Legacy</center></div>
    <div class="content" style="margin-left:20px">
<?php if ($this->_aVars['aLegacy']['legacy_mem_mom']): ?>
            <li><?php echo $this->_aVars['aLegacy']['legacy_mem_mom']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aLegacy']['legacy_mom_forg']): ?>
			<li><?php echo $this->_aVars['aLegacy']['legacy_mom_forg']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aLegacy']['legacy_mem_pers']): ?>
			<li><?php echo $this->_aVars['aLegacy']['legacy_mem_pers']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aLegacy']['legacy_grat_achiev']): ?>
			<li><?php echo $this->_aVars['aLegacy']['legacy_grat_achiev']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aLegacy']['legacy_things_learn']): ?>
			<li><?php echo $this->_aVars['aLegacy']['legacy_things_learn']; ?></li>
<?php endif; ?>
<?php if ($this->_aVars['aLegacy']['legacy_imp_shar_fam']): ?>
			<li><?php echo $this->_aVars['aLegacy']['legacy_imp_shar_fam']; ?></li>
<?php endif; ?>
		
        
<?php if ($this->_aVars['aUserId']): ?>
            <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('wenigoe.legacyform'); ?>"><strong>Update Legacy</strong></a>
<?php endif; ?>
    </div>
</div>
