<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="<?php echo route('admin.users.store').'?id=1&keyword=abc'; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email..." />
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password..." />
                </div>

                <div class="mb-3">
                    <label for="">Sở thích</label>
                    <p>
                        <input type="checkbox" name="like[]" value="Sở thích 1"> Sở thích 1
                    </p>
                    <p>
                        <input type="checkbox" name="like[]" value="Sở thích 2"> Sở thích 2
                    </p>

                    <p>
                        <input type="checkbox" name="like[]" value="Sở thích 3"> Sở thích 3
                    </p>
                </div>

                <div class="mb-3">
                    <input type="file" name="photo" class="form-control" />
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </form>

        </div>
    </div>
</div>
