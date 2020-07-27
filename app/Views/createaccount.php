<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Create a trading account</h3>
                <hr>
                <form class="" action="/create" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="balance">Choose your starting balance</label>
                                <input type="text" class="form-control" name="balance" id="balance" value="<?= set_value('firstname'); ?>">
                            </div>
                        </div>
                        <?php if(isset($validation)): ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <?php echo($validation->listErrors()); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>