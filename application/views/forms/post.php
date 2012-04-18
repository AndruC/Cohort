<?php

echo form_open('posts/create', array(
	'class' => 'new_post'
));

echo form_textarea(array(
	'name' => 'post_body',
	'style'=> 'width: 100%; height:200px;'
));

echo form_submit('post_submit', 'Confirm');

echo form_close();