

<?php $__env->startSection('title'); ?>
    Leads List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    
    <style>
        .board {
            /* background-color: rgb(90 166 255); */
            border-radius: 12px;
            padding-bottom: 4px;
            border: 1px solid #e0e0e0;
            background: #ffffff;
            box-shadow: 0px 0px 2px #888888;
        }

        .board-header p {
            padding: 10px;
            color: rgb(0, 91, 188);
        }

        .board-task {
            background-color: rgb(4, 126, 239);
            border-radius: 4px;
            margin: 10px;
            padding: 10px;
            color: white;
        }

        .board-body {
            height: 500px;
            overflow: scroll;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .board-body::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .board-body {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .task-info {
            font-size: 12px;
            margin-top: 2px;
        }

        .textarea {
            font-family: inherit;
            font-size: inherit;
            padding: 1px 6px;
            display: block;
            width: 100%;
            overflow: hidden;
            resize: both;
            min-height: 30px;
            line-height: 20px;
            border-radius: 3px;
            padding-top: 4px;
            background-color: white;
            resize: none;
        }

        .textarea[contenteditable]:empty::before {
            content: "Write a comment...";
            color: gray;
        }

        .modal-content {
            background-color: #f4f5f7;
        }

        .textarea:focus {
            outline-color: rgb(223 223 223 / 0%);
            outline: 0;
        }

        .comment-submit {
            background-color: white;
            padding: 3px 10px 8px 6px;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .btn-comment-submit {
            padding: 0.215rem 0.800rem
        }

        .comment-show-box {
            padding: 6px;
            background-color: white;
            border: 1px solid #bbbbbb;
            margin-bottom: 17px;
            border-radius: 3px;
            box-shadow: 0px 1px 0px #888888;
        }

        .comment-show-box {
            padding: 6px;
            background-color: white;
            margin-bottom: 17px;
            box-shadow: 0px 0 2px #888888;
            border-top: 3px solid rgb(90, 166, 255);
        }

        span.task-time {
            float: right;
            font-style: italic;
            font-size: 12px;
        }

        .modal-body {
            overflow-y: auto;
            max-height: 604px;
        }

        a.comment-delete {
            font-size: 12px;
            color: grey;
            text-decoration: underline;
        }

        .actions-container {
            margin-top: 6px;
        }

        .comment-container {
            margin-top: 8px;
        }

        span.file-placeholder {
            /* background-image: url(<?php echo e(url('images/php_mysql.jpg')); ?>); */
            /* background-color: lightblue; */
            display: inline-block;
            border-radius: 3px;
            width: 100px;
            text-align: center;
            padding: 30px 0;
            background-position: center;
            background-size: contain;
        }

        span.file-information {
            padding: 16px;
        }

        .attachment-container {
            margin-bottom: 6px;
            background: linear-gradient(to left, #f4f5f7 50%, #ececec 50%);
            background-size: 200% 100%;
            background-position: right bottom;
            transition: all 1s ease;
        }

        .attachment-container:hover {
            background-position: left bottom;
            border-radius: 3px;
        }

        a.attachment-link {
            color: black;
            font-weight: 600;
        }

        a.attachment-link:hover {
            color: black;
        }

        .width-image-modal {
            max-width: 80% !important;
        }

        .width-image-modal img {
            width: 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Leads
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            kanbanx List
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row ">
        <div class="col-lg-12">
            
            <div class=" d-flex flex-row" style="overflow-x: auto;">
                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>Fresh</strong></p>
                        </div>
                        <div class="board-body" id="fresh">
                            <?php $__currentLoopData = $leads->where('status', 'Fresh'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?> 
                                        </span>
                                        <!-- <span class="float-right" style="float: right;">
                                            <a class="docration-none text-light"
                                                href="<?php echo e(route('projects.show', $item->id)); ?>">View</a>
                                        </span> -->
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>Site Survey Done</strong></p>
                        </div>
                        <div class="board-body" id="site_survey_done">
                            <?php $__currentLoopData = $leads->where('status', 'Site Survey Done'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?> </span>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>Engineering Design</strong></p>
                        </div>
                        <div class="board-body" id="engineering_design">
                            <?php $__currentLoopData = $leads->where('status', 'Engineering Design'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?> </span>
                                        
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>Proposal Sent</strong></p>
                        </div>
                        <div class="board-body" id="proposal_sent">
                            <?php $__currentLoopData = $leads->where('status', 'Proposal Sent'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?> </span>
                                        
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>Commercials Finalized</strong></p>
                        </div>
                        <div class="board-body" id="commercials-finalized">
                            <?php $__currentLoopData = $leads->where('status', 'Commercials Finalized'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></span>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>PO Received</strong></p>
                        </div>
                        <div class="board-body" id="commercials-finalized">
                            <?php $__currentLoopData = $leads->where('status', 'PO Received'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></span>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-3 mx-2">
                    <div class="board">
                        <div class="board-header">
                            <p class="mb-0"><strong>Cold</strong></p>
                        </div>
                        <div class="board-body" id="commercials-finalized">
                            <?php $__currentLoopData = $leads->where('status', 'Cold'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="board-task" id="<?php echo e($item->id); ?>">
                                    <?php echo e($item->title); ?>

                                    <div class="mb-0 font-italic task-info" style="clear: both; display: block;">
                                        <span class=""
                                            style="color: red; float: left;"><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></span>
                                        <div style="clear: both;"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Git\egsa-solar\resources\views/admin/leads/kanban.blade.php ENDPATH**/ ?>