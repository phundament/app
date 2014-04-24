Access to pages in Phundament is handled with Yii's RBAC implementation and the package `crisu83/yii-rights`.

## Grant Permissions

Go to `Phundament > Rights > Assignments`.

## Create Rules, Operations or Tasks

Many controllers come with access filters for preventing unauthorized access to actions. Usually they are named by the following pattern: `(Module.)Controller.Action`.

To enable access to a new module you have to create the corresponding auth-items and assign them to a user or role.

* Go to `Phundament > Rights > Task`
* Create a new task with the name from the access filter in the controller
* Save