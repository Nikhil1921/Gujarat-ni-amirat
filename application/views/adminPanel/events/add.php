<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open() ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Title', 'title', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "title",
                'name' => "title",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('title') ? set_value('title') : (isset($data['title']) ? $data['title'] : '')
            ]); ?>
            <?= form_error('title') ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?= form_label('From Date', 'from_date', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "date",
                'id' => "from_date",
                'name' => "from_date",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('from_date') ? set_value('from_date') : (isset($data['from_date']) ? $data['from_date'] : '')
            ]); ?>
            <?= form_error('from_date') ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?= form_label('From Time', 'from_time', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "time",
                'id' => "from_time",
                'name' => "from_time",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('from_time') ? set_value('from_time') : (isset($data['from_time']) ? $data['from_time'] : '')
            ]); ?>
            <?= form_error('from_time') ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?= form_label('To Date', 'to_date', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "date",
                'id' => "to_date",
                'name' => "to_date",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('to_date') ? set_value('to_date') : (isset($data['to_date']) ? $data['to_date'] : '')
            ]); ?>
            <?= form_error('to_date') ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?= form_label('To Time', 'to_time', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "time",
                'id' => "to_time",
                'name' => "to_time",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('to_time') ? set_value('to_time') : (isset($data['to_time']) ? $data['to_time'] : '')
            ]); ?>
            <?= form_error('to_time') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Description', 'description', 'class="col-form-label"') ?>
            <?= form_textarea([
                'class' => "form-control",
                'id' => "description",
                'name' => "description",
                'required' => "",
                'rows' => 3,
                'value' => set_value('description') ? set_value('description') : (isset($data['description']) ? $data['description'] : '')
            ]); ?>
            <?= form_error('description') ?>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <div class="col-md-6">
          <?= form_button([ 'content' => 'Save',
          'type'  => 'submit',
          'class' => 'btn btn-outline-primary col-md-4']) ?>
        </div>
        <div class="col-md-6">
          <?= anchor($url, 'Cancel', 'class="btn btn-outline-danger col-md-4"'); ?>
        </div>
      </div>
    </div>
    <?= form_close() ?>
  </div>
</div>