<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $foreignKeys = config('permission.foreign_keys');

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('display_name', 50);
            $table->string('category', 50)->nullable();
            $table->string('guard_name', 50);
            $table->timestamps();
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('display_name', 50);
            $table->string('guard_name', 50);
            $table->timestamps();
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $foreignKeys) {
            $table->integer('permission_id')->unsigned();
            $table->unsignedInteger('model_id');
            $table->string('model_type', 50);

            $table->foreign('permission_id', 'jana_perm_user_perm_id_fk')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'model_id', 'model_type'], 'jana_perm_user_type_pk');
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $foreignKeys) {
            $table->integer('role_id')->unsigned();
            $table->unsignedInteger('model_id');
            $table->string('model_type', 50);

            $table->foreign('role_id', 'jana_role_user_role_id_fk')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['role_id', 'model_id', 'model_type'], 'jana_role_user_type_pk');
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id', 'jana_perm_role_perm_id_fk')
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign('role_id', 'jana_perm_role_role_id_fk')
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id'], 'jana_perm_role_pk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
