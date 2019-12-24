<!doctype html>
<html lang="en" ng-app="employeeRecords">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">

        <title>Laravel 6 AngularJS Tutorial</title>
    </head>
    <body>
        <div class="container" ng-controller="employeesController">
            <header>
                <h2>Employees Database</h2>
            </header>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Position</th>
                            <th><button id="btn-add" class="btn btn-primary
                                    btn-xs"
                                    ng-click="toggle('add', 0)">Add New Employee</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="employee in employees">
                            <td>{{ employee.id }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.email }}</td>
                            <td>{{ employee.contact_number }}</td>
                            <td>{{ employee.position }}</td>
                            <td>
                                <button class="btn btn-default btn-xs
                                    btn-detail"
                                    ng-click="toggle('edit', employee.id)">Edit</button>
                                <button class="btn btn-danger btn-xs btn-delete"
                                    ng-click="confirmDelete(employee.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{form_title}}</h5>
                            <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="frmEmployees" class="form-horizontal"
                                novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control
                                            has-error" id="name" name="name"
                                            placeholder="Fullname"
                                            value="{{name}}"
                                            ng-model="employee.name"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmployees.name.$invalid
                                            && frmEmployees.name.$touched">Name
                                            field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control"
                                            id="email" name="email"
                                            placeholder="Email Address"
                                            value="{{email}}"
                                            ng-model="employee.email"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmployees.email.$invalid
                                            && frmEmployees.email.$touched">Valid
                                            Email field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Contact No</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="contact_number"
                                            name="contact_number"
                                            placeholder="Contact Number"
                                            value="{{contact_number}}"
                                            ng-model="employee.contact_number"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmployees.contact_number.$invalid
                                            &&
                                            frmEmployees.contact_number.$touched">Contact
                                            number field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Position</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="position" name="position"
                                            placeholder="Position"
                                            value="{{position}}"
                                            ng-model="employee.position"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmEmployees.position.$invalid
                                            && frmEmployees.position.$touched">Position
                                            field is required</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                id="btn-save" ng-click="save(modalstate, id)"
                                ng-disabled="frmEmployees.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script
            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script
            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
        <script
            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/employees.js') ?>"></script>
    </body>
</html>