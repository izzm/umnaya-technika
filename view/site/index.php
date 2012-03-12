<div id="slider">
  <ul>				
	  <li>
	    <div style="position:relative">
	      <img src="/images/interiors/1.jpg" alt="Css Template Preview" />
	      
        <a href=""><div class="pointContainer" style="left:190px; top:28px"></div></a>
        <a href=""><div class="pointContainer" style="left:676px; top:91px" ></div></a>
        <a href="#" class="formlink" rel="feedback"><div class="pointContainer" style="left:68px; top:259px" ></div></a>
        <a href=""><div class="pointContainer" style="left:409px; top:302px" ></div></a>
        <a href="#" class="formlink" rel="lastNews"><div class="pointContainer" style="left:855px; top:331px" ></div></a>
      </div>
    </li>
	  <li>
	    <div style="position:relative">
	      <img src="/images/interiors/2.jpg" alt="Css Template Preview" />
	      
        <a href="#" class="formlink" rel="feedback"><div class="pointContainer" style="left:65px; top:259px" ></div></a>
        <a href=""><div class="pointContainer" style="left:290px; top:130px" ></div></a>
        <a href=""><div class="pointContainer" style="left:666px; top:20px" ></div></a>
        <a href="#" class="formlink" rel="lastNews"><div class="pointContainer" style="left:860px; top:330px" ></div></a>
      </div>
    </li>
	  <li>
	    <div style="position:relative">
	      <img src="/images/interiors/3.jpg" alt="Css Template Preview" />
	      
        <a href="#" class="formlink" rel="feedback"><div class="pointContainer" style="left:46px; top:259px" ></div></a>
        <a href=""><div class="pointContainer" style="left:257px; top:212px" ></div></a>
        <a href=""><div class="pointContainer" style="left:585px; top:276px" ></div></a>
        <a href=""><div class="pointContainer" style="left:903px; top:210px" ></div></a>
        <a href="#" class="formlink" rel="lastNews"><div class="pointContainer" style="left:860px; top:331px" ></div></a>
    	</div>
    </li>
	  <li>
	    <div style="position:relative">
	      <img src="/images/interiors/4.jpg" alt="Css Template Preview" />
	      
        <a href="#" class="formlink" rel="feedback"><div class="pointContainer" style="left:70px; top:259px" ></div></a>
        <a href=""><div class="pointContainer" style="left:593px; top:240px" ></div></a>
        <a href=""><div class="pointContainer" style="left:745px; top:207px" ></div></a>
        <a href=""><div class="pointContainer" style="left:850px; top:137px" ></div></a>
        <a href="#" class="formlink" rel="lastNews"><div class="pointContainer" style="left:857px; top:331px" ></div></a>
      </div>
    </li>
  </ul>
</div>

<div id="fader"></div>
<div id="fader" style="left:1035px; background:url(images/fader_r.png)"></div>


<script id="dummyTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('action' => 'dummy')); ?>
</script>

<script id="registerTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'sales', 'action' => 'register')); ?>
</script>

<script id="statTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'sales', 'action' => 'stat')); ?>
</script>

<script id="salesTableTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'sales', 'action' => 'table')); ?>
</script>

<script id="cabinetTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'site', 'action' => 'cabinet')); ?>
</script>

<script id="rulesTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'site', 'action' => 'rules')); ?>
</script>

<script id="feedbackTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'feedback', 'action' => 'signed')); ?>
</script>

<script id="lastNewsTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'news', 'action' => 'last')); ?>
</script>

<script id="lastNewsTableTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'news', 'action' => 'lastTable')); ?>
</script>

<script id="archiveNewsTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'news', 'action' => 'archive')); ?>
</script>

<script id="archiveNewsTableTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'news', 'action' => 'archiveTable')); ?>
</script>

<script id="showNewsTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'news', 'action' => 'show')); ?>
</script>

<script id="showNewsContentTemplate" type="text/x-jquery-tmpl">
  <?php $this->renderAction(array('controller' => 'news', 'action' => 'content')); ?>
</script>
