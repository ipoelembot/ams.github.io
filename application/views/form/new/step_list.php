<ul class="nav nav-pills nav-justified steps">
	<?php
		foreach ($step as $step) 
		{
			echo 
			"
			<li>
				<a href='".$step->url."' data-toggle='tab' class='step ".$step->active."'>
				<span class='number'>".$step->step_id."</span><br>
				<span class='desc' style='font-size:13px;'>".$step->nama_step."</span>
				</a>		
			</li>
			";
		}
	?>
</ul>