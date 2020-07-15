<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?= base_url('auth/registration'); ?>" method="post">
<input type="text" name="name" placeholder="name"></input>
<?= form_error('name','<h6 class="label label-danger text-left">','</h6>') ?>
<br>

<input type="email" name="email" placeholder="email"></input>
<?= form_error('email','<h6 class="label label-danger text-left">','</h6>') ?>
<br>
<input type="password" name="password" placeholder="password"></input>
<?= form_error('password','<h6 class="label label-danger text-left">','</h6>') ?>
<br>
<button type="submit">SAVE</button>
</form>
</body>
</html>

