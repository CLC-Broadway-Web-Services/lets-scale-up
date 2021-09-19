<?= $this->extend('Frontend/layouts/main'); ?>

<?= $this->section('content'); ?>

<section class="home-section section-grey">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Subscription</h1>
                <p></p>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <!--start code-->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Inbox</h5>
                                <form id="send-message" class="send-message-form">
                                    <div class="input-group">
                                        <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
                                        <span class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Send <i class="fas fa-airplane"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body messages-box">
                                <ul class="list-unstyled messages-list">
                                    <?php foreach ($messages as $key => $message) : ?>
                                        <?php if ($message['is_user']) : ?>
                                            <li class="messages-me clearfix">
                                                <span class="message-img">
                                                    <img src="https://demo.bootstrap.news/bootnews/assets/img/avatar/avatar1.png" alt="User Avatar" class="avatar-sm border rounded-circle">
                                                </span>
                                                <div class="message-body clearfix">
                                                    <div class="message-header">
                                                        <strong class="messages-title">Me</strong>
                                                        <small class="time-messages text-muted">
                                                            <span class="fas fa-time"></span> <span class="minutes">1</span> mins ago
                                                        </small>
                                                    </div>
                                                    <p class="messages-p">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.
                                                    </p>
                                                </div>
                                            </li>
                                        <?php else : ?>
                                            <li class="messages-you clearfix">
                                                <span class="message-img img-circle">
                                                    <img src="https://demo.bootstrap.news/bootnews/assets/img/avatar/avatar2.png" alt="User Avatar" class="avatar-sm border rounded-circle">
                                                </span>
                                                <div class="message-body clearfix">
                                                    <div class="message-header">
                                                        <strong class="messages-title">John Dave</strong>
                                                        <small class="time-messages text-muted">
                                                            <span class="fas fa-time"></span>1 mins ago
                                                        </small>
                                                    </div>
                                                    <p class="messages-p">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                        dolor, quis ullamcorper ligula sodales.
                                                    </p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <!--end code-->
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Documents</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table datatable datatableSimple">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sn.</th>
                                                <th scope="col">Document Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($documents as $key => $document) : ?>
                                                <tr>
                                                    <td><?= $key ?></td>
                                                    <td><?= $key ?></td>
                                                    <td><?= $key ?></td>
                                                    <td><?= $key ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<style>
    /*------------------------------------
    Messages
    ------------------------------------*/
    .unread {
        cursor: pointer;
        background-color: #f4f4f4;
    }

    .messages-box {
        max-height: 300px;
        overflow: auto;
    }

    .online-circle {
        border-radius: 5rem;
        width: 5rem;
        height: 5rem;
    }

    .messages-title {
        float: right;
        margin: 0px 5px;
    }

    .message-img {
        float: right;
        margin: 0px 5px;
    }

    .message-header {
        text-align: right;
        width: 100%;
        margin-bottom: 0.5rem;
    }

    .text-editor {
        min-height: 18rem;
    }

    .messages-list li.messages-you .messages-title {
        float: left;
    }

    .messages-list li.messages-you .message-img {
        float: left;
    }

    .messages-list li.messages-you p {
        float: left;
        text-align: left;
    }

    .messages-list li.messages-you .message-header {
        text-align: left;
    }

    .messages-list li p {
        max-width: 60%;
        padding: 5px;
        border: #e6e7e9 1px solid;
    }

    .messages-list li.messages-me p {
        float: right;
    }

    .ql-editor p {
        font-size: 1rem;
    }
</style>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    // chat message js
    $('#send-message').on('submit', function(event) {
        event.preventDefault();
        var message = $('.messages-me').first().clone();
        message.find('p').text($('#input-me').val());
        $('#input-me').val('');
        message.prependTo('.messages-list');
        message.find('.minutes').text("0");
    });
</script>
<?= $this->endSection(); ?>