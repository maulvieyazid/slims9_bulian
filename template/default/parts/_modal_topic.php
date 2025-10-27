<?php
/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2020-01-02 16:27
 * @File name           : _modal_topic.php
 */

?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=  __('Select the topic you are interested in'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="topic d-flex flex-wrap justify-content-center p-0">
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Biodiversity'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/14-biodiversity.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Biodiversity'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Smart+Waste'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/15-smart-waste.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Smart Waste'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Strategy'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/16-strategy.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Strategy'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Blueprint'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/17-blueprint.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Blueprint'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Visitation'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/18-visitation.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Visitation'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Guideline'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/19-guideline.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Guideline'); ?>
                        </a>
                    </li>
                    <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?subject='Net+Zero'&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/20-net-zero.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Net Zero'); ?>
                        </a>
                    </li>
                    <!-- <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?callnumber=7&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/7-quill.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Art & Recreation'); ?>
                        </a>
                    </li> -->
                    <!-- <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?callnumber=8&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/8-books.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('Literature'); ?>
                        </a>
                    </li> -->
                    <!-- <li class="d-flex justify-content-center align-items-center m-2">
                        <a href="index.php?callnumber=9&search=search" class="d-flex flex-column">
                            <img src="<?=  assets('images/9-return-to-the-past.png'); ?>" width="80" class="mb-3 mx-auto"/>
                            <?=  __('History & Geography'); ?>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div class="modal-footer text-muted text-sm">
                <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
            </div>
        </div>
    </div>
</div>
