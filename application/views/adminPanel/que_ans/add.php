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
            <?= form_label('Question', 'questions', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "questions",
                'name' => "questions",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('questions') ? set_value('questions') : (isset($data['questions']) ? $data['questions'] : '')
            ]); ?>
            <?= form_error('questions') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Answer', 'answers', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "answers",
                'name' => "answers",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('answers') ? set_value('answers') : (isset($data['answers']) ? $data['answers'] : '')
            ]); ?>
            <?= form_error('answers') ?>
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