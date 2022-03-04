<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
    </div>
    <?= form_open() ?>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Category', 'cat_id', 'class="col-form-label"') ?>
            <?php $cat = []; foreach ($cats as $v):
            $cat[$v['id']] = ucwords($v['cat_name']);
            endforeach ?>
            <?= form_dropdown('cat_id', $cat, (!empty(set_value('cat_id'))) ? set_value('cat_id') : (isset($data['cat_id']) ? $data['cat_id'] : FALSE),
            ['id' => 'cat_id',
            'class' => 'form-control select2',
            ]) ?>
            <?= form_error('cat_id') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Title', 'title', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "title",
                'name' => "title",
                'maxlength' => 100,
                'required' => "",
                'value' => set_value('title') ? set_value('title') : (isset($data['title']) ? $data['title'] : '')
            ]); ?>
            <?= form_error('title') ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?= form_label('Video url', 'video', 'class="col-form-label"') ?>
            <?= form_input([
                'class' => "form-control",
                'type' => "text",
                'id' => "video",
                'name' => "video",
                'maxlength' => 100,
                'required' => "",
                'value' => set_value('video') ? set_value('video') : (isset($data['video']) ? $data['video'] : '')
            ]); ?>
            <?= form_error('video') ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <?= form_label('Description', 'description', 'class="col-form-label"') ?>
            <?= form_textarea([
                'class' => "form-control",
                'type' => "text",
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