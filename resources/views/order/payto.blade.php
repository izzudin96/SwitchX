<div class="panel panel-default">
    <div class="panel-heading">
        <strong>
            Pay to who?
        </strong>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">
                    Bank Name
                </label>
                <div class="col-md-6 panel-align">
                    {{ $dashboard->bankDetails()['bankName'] }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">
                    Account Name
                </label>
                <div class="col-md-6 panel-align">
                    {{ $dashboard->bankDetails()['accountNo'] }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">
                    Holder's Name
                </label>
                <div class="col-md-6 panel-align">
                    {{ $dashboard->bankDetails()['holderName'] }}
                </div>
            </div>
        </form>
    </div>
</div>