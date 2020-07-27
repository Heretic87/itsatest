<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Hello, <?= session()->get('firstname'); ?></h1>
        </div>
    </div>
    <div class="col-sm offset-6">
        <a href="/create" class="btn btn-primary">Create a new trading account</a>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
        
        <th scope="col">Account ID</th>
        <th scope="col">Balance</th>
        <th scope="col">Earnings %</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($accInfo) != 0): ?>
            <?php for($i = 0; $i < count($accInfo); $i++): ?>
                <tr>
                    <td><?= $accInfo[$i]['id'] ?></td>
                    <td><?= $accInfo[$i]['balance'] ?></td>
                    <td></td>
                    <td>
                        <form method="post" action="/deleteaccount">
                        <input type="hidden" name="accountid" value="<?= $accInfo[$i]['id'] ?>">
                        <button class="btn btn-danger">Delete Account</button>
                        </form>
                    </td>
                </tr>
            <?php endfor; ?>
        <?php endif; ?>
        </tbody>
        
    </table>
    <?php if(count($accInfo) == 0): ?>
        <h4 class="text-center">You have got no trading account yet.</h4>
    <?php endif; ?>
</div>