<h2><?php echo $title; ?></h2>
<form action="" method="post">
    <div>
        <label for="">Họ và tên</label> <br/>
        <input type="text" name="name" placeholder="Họ và tên"/>
    </div>
    <button type="submit">Submit</button>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
    <input type="hidden" name="_method" value="POST"/>
</form>