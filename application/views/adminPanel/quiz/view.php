<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
    <div class="card card-success card-outline">
        <div class="card-header">
        <h5 class="card-title m-0"><?= ucwords($operation).' '.ucwords($title) ?></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Name', 'name', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "name",
                            'readonly' => '',
                            'value' => $data['name']
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Phone', 'phone', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "phone",
                            'readonly' => '',
                            'value' => $data['phone']
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('School', 'school', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "school",
                            'readonly' => '',
                            'value' => $data['school']
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('City', 'city', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "city",
                            'readonly' => '',
                            'value' => $data['city']
                        ]); ?>
                    </div>
                </div>
                <?php foreach (json_decode($data['answers']) as $k => $v): ?>
                    <div class="col-md-10">
                        <div class="form-group">
                            <?= form_label('Question', 'question', 'class="col-form-label"') ?>
                            <?= form_input([
                                'class' => "form-control",
                                'id' => "question_$k",
                                'readonly' => '',
                                'value' => $this->main->check('questions', ['id' => $k], 'question')
                            ]); ?>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <?= form_label('Answer', 'answer', 'class="col-form-label"') ?>
                            <?= form_input([
                                'class' => "form-control",
                                'id' => "answer_$k",
                                'readonly' => '',
                                'value' => $this->main->check('questions', ['id' => $k], 'answer')
                            ]); ?>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <?= form_label('Given', 'given_answer', 'class="col-form-label"') ?>
                            <?= form_input([
                                'class' => "form-control",
                                'id' => "given_answer_$k",
                                'readonly' => '',
                                'value' => $v
                            ]); ?>
                        </div>
                    </div>
                <?php endforeach ?>
                
            </div>
        </div>
        <div class="card-footer">
        <div class="row">
            <div class="col-md-6">
            <?= anchor($url, 'Go Back', 'class="btn btn-outline-danger col-md-4"'); ?>
            </div>
        </div>
        </div>
    </div>
</div>