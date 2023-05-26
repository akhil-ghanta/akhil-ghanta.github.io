<?php use App\Models\Button; $button = Button::find($button_id); if(isset($button->name)){$buttonName = $button->name;}else{$buttonName = 0;} ?>

<select style="display:none" name="button" class="form-control"><option class="button button-default email" value="default email">Default Email</option></select>

<label for='title' class='form-label'>Custom Title</label>
<input type='text' name='title' value='{{$link_title}}' class='form-control' />
<span class='small text-muted'>Leave blank for default title</span><br>

<label for='link' class='form-label'>E-Mail address</label>
<input type='email' name='link' value='{{str_replace("mailto:", "", $link_url)}}' class='form-control' required />
<span class='small text-muted'>Enter your E-Mail</span>

