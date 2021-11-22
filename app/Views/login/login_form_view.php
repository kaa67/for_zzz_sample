<form action="/login" method="post">
<div class="form-floating mb-3">
    <input
	  name="email"
	  type="email"
	  class="form-control"
	  id="email"
	  value="<?=$email?>"
	  placeholder="Email pls"
	>
    <label for="email">Email address</label>
  </div>
  <div class="form-floating mb-3">
    <input
	  name="password"
	  type="password"
	  class="form-control"
	  id="password"
	  value="<?=$password?>"
	  placeholder="Password here"
	>
    <label for="password">Password</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<? if (!empty($errors)): ?>
	<? foreach ($errors as $error): ?>
		<div class="alert alert-danger" role="alert">
		    <?=$error?>
		</div>
	<? endforeach; ?>
	
<? endif; ?>
