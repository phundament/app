<?php

namespace app\helpers;

/**
 * Date: 20.11.13
 * Time: 23:00
 * Class Glyph
 * Create a Glyphicon
 *
 * For example,
 *
 *twig
 * {{ glyph.icon( constant( '\\common\\helpers\\Glyph::ICON_BELL')) )|raw }}
 *
 * ```php
 * echo Glyph::icon(Glyph::ICON_BELL);
 * ```
 *
 * @author: Pascal Brewing < pascalbrewing@googlemail.com >
 * @see http://getbootstrap.com/components/#glyphicons
 * @since 2.0
 */
use Yii;
use yii\helpers\Html;

class Glyph {

    /**
     * @param string $icon
     * ```php'['class'] => 'glyphicon '.$icon'```
     * @param string $tag
     * ```php 'span' ```
     * @param string $content
     * ```php '' ```
     * @param array $htmlOptions
     * ```php [] ```
     * @return string
     */
    public static function icon($icon = '',$tag='span',$content = '',$htmlOptions = []){
        $token = uniqid($icon);
        if (YII_DEBUG)
            Yii::beginProfile($token, __METHOD__);

        //This method is faster than 2ms Html::addCssClass($htmlOptions,'glyphicon '.$icon);
        $htmlOptions['class'] = isset($htmlOptions['class'])?$htmlOptions['class'].' glyphicon '.$icon:'glyphicon '.$icon;

        if (YII_DEBUG)
            Yii::endProfile($token, __METHOD__);
        return Html::tag($tag,$content,$htmlOptions);
    }

    //
    // ICONS
    // --------------------------------------------------
    const ICON_ADJUST                   = 'glyphicon-adjust';
    const ICON_ALIGN_CENTER             = 'glyphicon-align-center';
    const ICON_ALIGN_JUSTIFY            = 'glyphicon-align-justify';
    const ICON_ALIGN_LEFT               = 'glyphicon-align-left';
    const ICON_ALIGN_RIGHT              = 'glyphicon-align-right';
    const ICON_ARROW_DOWN               = 'glyphicon-arrow-down';
    const ICON_ARROW_LEFT               = 'glyphicon-arrow-left';
    const ICON_ARROW_RIGHT              = 'glyphicon-arrow-right';
    const ICON_ARROW_UP                 = 'glyphicon-arrow-up';
    const ICON_ASTERISK                 = 'glyphicon-asterisk';
    const ICON_BACKWARD                 = 'glyphicon-backward';
    const ICON_BAN_CIRCLE               = 'glyphicon-ban-circle';
    const ICON_BARCODE                  = 'glyphicon-barcode';
    const ICON_BELL                     = 'glyphicon-bell';
    const ICON_BOLD                     = 'glyphicon-bold';
    const ICON_BOOK                     = 'glyphicon-book';
    const ICON_BOOKMARK                 = 'glyphicon-bookmark';
    const ICON_BRIEFCASE                = 'glyphicon-briefcase';
    const ICON_BULLHORN                 = 'glyphicon-bullhorn';
    const ICON_CALENDAR                 = 'glyphicon-calendar';
    const ICON_CAMERA                   = 'glyphicon-camera';
    const ICON_CERTIFICATE              = 'glyphicon-certificate';
    const ICON_CHECK                    = 'glyphicon-check';
    const ICON_CHEVRON_DOWN             = 'glyphicon-chevron-down';
    const ICON_CHEVRON_LEFT             = 'glyphicon-chevron-left';
    const ICON_CHEVRON_RIGHT            = 'glyphicon-chevron-right';
    const ICON_CHEVRON_UP               = 'glyphicon-chevron-up';
    const ICON_CIRCLE_ARROW_DOWN        = 'glyphicon-circle-arrow-down';
    const ICON_CIRCLE_ARROW_LEFT        = 'glyphicon-circle-arrow-left';
    const ICON_CIRCLE_ARROW_RIGHT       = 'glyphicon-circle-arrow-right';
    const ICON_CIRCLE_ARROW_UP          = 'glyphicon-circle-arrow-up';
    const ICON_CLOUD                    = 'glyphicon-cloud';
    const ICON_CLOUD_DOWNLOAD           = 'glyphicon-cloud-download';
    const ICON_CLOUD_UPLOAD             = 'glyphicon-cloud-upload';
    const ICON_COG                      = 'glyphicon-cog';
    const ICON_COLLAPSE_DOWN            = 'glyphicon-collapse-down';
    const ICON_COLLAPSE_UP              = 'glyphicon-collapse-up';
    const ICON_COMMENT                  = 'glyphicon-comment';
    const ICON_COMPRESSED               = 'glyphicon-compressed';
    const ICON_COPYRIGHT_MARK           = 'glyphicon-copyright-mark';
    const ICON_CREDIT_CARD              = 'glyphicon-credit-card';
    const ICON_CUTLERY                  = 'glyphicon-cutlery';
    const ICON_DASHBOARD                = 'glyphicon-dashboard';
    const ICON_DOWNLOAD                 = 'glyphicon-download';
    const ICON_DOWNLOAD_ALT             = 'glyphicon-download-alt';
    const ICON_EARPHONE                 = 'glyphicon-earphone';
    const ICON_EDIT                     = 'glyphicon-edit';
    const ICON_EJECT                    = 'glyphicon-eject';
    const ICON_ENVELOPE                 = 'glyphicon-envelope';
    const ICON_EURO                     = 'glyphicon-euro';
    const ICON_EXCLAMATION_SIGN         = 'glyphicon-exclamation-sign';
    const ICON_EXPAND                   = 'glyphicon-expand';
    const ICON_EXPORT                   = 'glyphicon-export';
    const ICON_EYE_CLOSE                = 'glyphicon-eye-close';
    const ICON_EYE_OPEN                 = 'glyphicon-eye-open';
    const ICON_FACETIME_VIDEO           = 'glyphicon-facetime-video';
    const ICON_FAST_BACKWARD            = 'glyphicon-fast-backward';
    const ICON_FAST_FORWARD             = 'glyphicon-fast-forward';
    const ICON_FILE                     = 'glyphicon-file';
    const ICON_FILM                     = 'glyphicon-film';
    const ICON_FILTER                   = 'glyphicon-filter';
    const ICON_FIRE                     = 'glyphicon-fire';
    const ICON_FLAG                     = 'glyphicon-flag';
    const ICON_FLASH                    = 'glyphicon-flash';
    const ICON_FLOPPY_DISK              = 'glyphicon-floppy-disk';
    const ICON_FLOPPY_OPEN              = 'glyphicon-floppy-open';
    const ICON_FLOPPY_REMOVE            = 'glyphicon-floppy-remove';
    const ICON_FLOPPY_SAVE              = 'glyphicon-floppy-save';
    const ICON_FLOPPY_SAVED             = 'glyphicon-floppy-saved';
    const ICON_FOLDER_CLOSE             = 'glyphicon-folder-close';
    const ICON_FOLDER_OPEN              = 'glyphicon-folder-open';
    const ICON_FONT                     = 'glyphicon-font';
    const ICON_FORWARD                  = 'glyphicon-forward';
    const ICON_FULLSCREEN               = 'glyphicon-fullscreen';
    const ICON_GBP                      = 'glyphicon-gbp';
    const ICON_GIFT                     = 'glyphicon-gift';
    const ICON_GLASS                    = 'glyphicon-glass';
    const ICON_GLOBE                    = 'glyphicon-globe';
    const ICON_HAND_DOWN                = 'glyphicon-hand-down';
    const ICON_HAND_LEFT                = 'glyphicon-hand-left';
    const ICON_HAND_RIGHT               = 'glyphicon-hand-right';
    const ICON_HAND_UP                  = 'glyphicon-hand-up';
    const ICON_HD_VIDEO                 = 'glyphicon-hd-video';
    const ICON_HDD                      = 'glyphicon-hdd';
    const ICON_HEADER                   = 'glyphicon-header';
    const ICON_HEADPHONES               = 'glyphicon-headphones';
    const ICON_HEART                    = 'glyphicon-heart';
    const ICON_HEART_EMPTY              = 'glyphicon-heart-empty';
    const ICON_HOME                     = 'glyphicon-home';
    const ICON_IMPORT                   = 'glyphicon-import';
    const ICON_INBOX                    = 'glyphicon-inbox';
    const ICON_INDENT_LEFT              = 'glyphicon-indent-left';
    const ICON_INDENT_RIGHT             = 'glyphicon-indent-right';
    const ICON_INFO_SIGN                = 'glyphicon-info-sign';
    const ICON_ITALIC                   = 'glyphicon-italic';
    const ICON_LEAF                     = 'glyphicon-leaf';
    const ICON_LINK                     = 'glyphicon-link';
    const ICON_LIST                     = 'glyphicon-list';
    const ICON_LIST_ALT                 = 'glyphicon-list-alt';
    const ICON_LOCK                     = 'glyphicon-lock';
    const ICON_LOG_IN                   = 'glyphicon-log-in';
    const ICON_LOG_OUT                  = 'glyphicon-log-out';
    const ICON_MAGNET                   = 'glyphicon-magnet';
    const ICON_MAP_MARKER               = 'glyphicon-map-marker';
    const ICON_MINUS                    = 'glyphicon-minus';
    const ICON_MINUS_SIGN               = 'glyphicon-minus-sign';
    const ICON_MOVE                     = 'glyphicon-move';
    const ICON_MUSIC                    = 'glyphicon-music';
    const ICON_NEW_WINDOW               = 'glyphicon-new-window';
    const ICON_OFF                      = 'glyphicon-off';
    const ICON_OK                       = 'glyphicon-ok';
    const ICON_OK_CIRCLE                = 'glyphicon-ok-circle';
    const ICON_OK_SIGN                  = 'glyphicon-ok-sign';
    const ICON_OPEN                     = 'glyphicon-open';
    const ICON_PAPERCLIP                = 'glyphicon-paperclip';
    const ICON_PAUSE                    = 'glyphicon-pause';
    const ICON_PENCIL                   = 'glyphicon-pencil';
    const ICON_PHONE                    = 'glyphicon-phone';
    const ICON_PHONE_ALT                = 'glyphicon-phone-alt';
    const ICON_PICTURE                  = 'glyphicon-picture';
    const ICON_PLANE                    = 'glyphicon-plane';
    const ICON_PLAY                     = 'glyphicon-play';
    const ICON_PLAY_CIRCLE              = 'glyphicon-play-circle';
    const ICON_PLUS                     = 'glyphicon-plus';
    const ICON_PLUS_SIGN                = 'glyphicon-plus-sign';
    const ICON_PRINT                    = 'glyphicon-print';
    const ICON_PUSHPIN                  = 'glyphicon-pushpin';
    const ICON_QRCODE                   = 'glyphicon-qrcode';
    const ICON_QUESTION_SIGN            = 'glyphicon-question-sign';
    const ICON_RANDOM                   = 'glyphicon-random';
    const ICON_RECORD                   = 'glyphicon-record';
    const ICON_REFRESH                  = 'glyphicon-refresh';
    const ICON_REGISTRATION_MARK        = 'glyphicon-registration-mark';
    const ICON_REMOVE                   = 'glyphicon-remove';
    const ICON_REMOVE_CIRCLE            = 'glyphicon-remove-circle';
    const ICON_REMOVE_SIGN              = 'glyphicon-remove-sign';
    const ICON_REPEAT                   = 'glyphicon-repeat';
    const ICON_RESIZE_FULL              = 'glyphicon-resize-full';
    const ICON_RESIZE_HORIZONTAL        = 'glyphicon-resize-horizontal';
    const ICON_RESIZE_SMALL             = 'glyphicon-resize-small';
    const ICON_RESIZE_VERTICAL          = 'glyphicon-resize-vertical';
    const ICON_RETWEET                  = 'glyphicon-retweet';
    const ICON_ROAD                     = 'glyphicon-road';
    const ICON_SAVE                     = 'glyphicon-save';
    const ICON_SAVED                    = 'glyphicon-saved';
    const ICON_SCREENSHOT               = 'glyphicon-screenshot';
    const ICON_SD_VIDEO                 = 'glyphicon-sd-video';
    const ICON_SEARCH                   = 'glyphicon-search';
    const ICON_SEND                     = 'glyphicon-send';
    const ICON_SHARE                    = 'glyphicon-share';
    const ICON_SHARE_ALT                = 'glyphicon-share-alt';
    const ICON_SHOPPING_CART            = 'glyphicon-shopping-cart';
    const ICON_SIGNAL                   = 'glyphicon-signal';
    const ICON_SORT                     = 'glyphicon-sort';
    const ICON_SORT_BY_ALPHABET         = 'glyphicon-sort-by-alphabet';
    const ICON_SORT_BY_ALPHABET_ALT     = 'glyphicon-sort-by-alphabet-alt';
    const ICON_SORT_BY_ATTRIBUTES       = 'glyphicon-sort-by-attributes';
    const ICON_SORT_BY_ATTRIBUTES_ALT   = 'glyphicon-sort-by-attributes-alt';
    const ICON_SORT_BY_ORDER            = 'glyphicon-sort-by-order';
    const ICON_SORT_BY_ORDER_ALT        = 'glyphicon-sort-by-order-alt';
    const ICON_SOUND_5_1                = 'glyphicon-sound-5-1';
    const ICON_SOUND_6_1                = 'glyphicon-sound-6-1';
    const ICON_SOUND_7_1                = 'glyphicon-sound-7-1';
    const ICON_SOUND_DOLBY              = 'glyphicon-sound-dolby';
    const ICON_SOUND_STEREO             = 'glyphicon-sound-stereo';
    const ICON_STAR                     = 'glyphicon-star';
    const ICON_STAR_EMPTY               = 'glyphicon-star-empty';
    const ICON_STATS                    = 'glyphicon-stats';
    const ICON_STEP_BACKWARD            = 'glyphicon-step-backward';
    const ICON_STEP_FORWARD             = 'glyphicon-step-forward';
    const ICON_STOP                     = 'glyphicon-stop';
    const ICON_SUBTITLES                = 'glyphicon-subtitles';
    const ICON_TAG                      = 'glyphicon-tag';
    const ICON_TAGS                     = 'glyphicon-tags';
    const ICON_TASKS                    = 'glyphicon-tasks';
    const ICON_TEXT_HEIGHT              = 'glyphicon-text-height';
    const ICON_TEXT_WIDTH               = 'glyphicon-text-width';
    const ICON_TH                       = 'glyphicon-th';
    const ICON_TH_LARGE                 = 'glyphicon-th-large';
    const ICON_TH_LIST                  = 'glyphicon-th-list';
    const ICON_THUMBS_DOWN              = 'glyphicon-thumbs-down';
    const ICON_THUMBS_UP                = 'glyphicon-thumbs-up';
    const ICON_TIME                     = 'glyphicon-time';
    const ICON_TINT                     = 'glyphicon-tint';
    const ICON_TOWER                    = 'glyphicon-tower';
    const ICON_TRANSFER                 = 'glyphicon-transfer';
    const ICON_TRASH                    = 'glyphicon-trash';
    const ICON_TREE_CONIFER             = 'glyphicon-tree-conifer';
    const ICON_TREE_DECIDUOUS           = 'glyphicon-tree-deciduous';
    const ICON_UNCHECKED                = 'glyphicon-unchecked';
    const ICON_UPLOAD                   = 'glyphicon-upload';
    const ICON_USD                      = 'glyphicon-usd';
    const ICON_USER                     = 'glyphicon-user';
    const ICON_VOLUME_DOWN              = 'glyphicon-volume-down';
    const ICON_VOLUME_OFF               = 'glyphicon-volume-off';
    const ICON_VOLUME_UP                = 'glyphicon-volume-up';
    const ICON_WARNING_SIGN             = 'glyphicon-warning-sign';
    const ICON_WRENCH                   = 'glyphicon-wrench';
    const ICON_ZOOM_IN                  = 'glyphicon-zoom-in';
    const ICON_ZOOM_OUT                 = 'glyphicon-zoom-out';
} 