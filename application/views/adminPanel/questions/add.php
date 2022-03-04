<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open() ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <?= form_label('Question', 'question', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "question",
                'name' => "question",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('question') ? set_value('question') : (isset($data['question']) ? $data['question'] : '')
            ]); ?>
            <?= form_error('question') ?>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <?= form_label('Answer', 'answer', 'class="col-form-label"') ?>
            <?php $options = ['A'=>'A','B'=>'B','C'=>'C','D'=>'D'] ?>
            <?= form_dropdown('answer', $options, set_value('answer') ? set_value('answer') : (isset($data['answer']) ? $data['answer'] : ''), 'class="form-control"'); ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Option A', 'option_a', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "option_a",
                'name' => "option_a",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('option_a') ? set_value('option_a') : (isset($data['option_a']) ? $data['option_a'] : '')
            ]); ?>
            <?= form_error('option_a') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Option B', 'option_b', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "option_b",
                'name' => "option_b",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('option_b') ? set_value('option_b') : (isset($data['option_b']) ? $data['option_b'] : '')
            ]); ?>
            <?= form_error('option_b') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Option C', 'option_c', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "option_c",
                'name' => "option_c",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('option_c') ? set_value('option_c') : (isset($data['option_c']) ? $data['option_c'] : '')
            ]); ?>
            <?= form_error('option_c') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Option D', 'option_d', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "option_d",
                'name' => "option_d",
                'maxlength' => 255,
                'required' => "",
                'value' => set_value('option_d') ? set_value('option_d') : (isset($data['option_d']) ? $data['option_d'] : '')
            ]); ?>
            <?= form_error('option_d') ?>
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