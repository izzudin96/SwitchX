<div class="panel panel-default">
    <div class="panel-heading">
        <p class="text-center">Navigation</p>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard">Account</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/general') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/general">General</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/payment') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/payment">Payment</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/homepage') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/homepage">Homepage</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/product') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/product">Products</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/order') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/order">Orders</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/user') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/user">Users</a>
            </li>
            <li role="presentation" class="{{ Request::is('dashboard/analytics') ? 'active' : '' }}">
                <a class="text-center" href="/dashboard/analytics">Analytics</a>
            </li>
        </ul>
    </div>
</div>
