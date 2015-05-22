<?php
class Template
{
  // html блока
   static function custom_fields_html($post)
    {
        ?>
        <p>Price in $: <label><input type="text" name="extra[price]"
                                     value="<?php echo get_post_meta($post->ID, 'price', 1); ?>"
                                     style="width:30%"/></label></p>

        <p>Description (description):
            <textarea type="text" name="extra[description]"
                      style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'description', 1); ?></textarea>
        </p>

        <p>Country<select name="extra[country]"/>
            <?php $sel_v = get_post_meta($post->ID, 'country', 1); ?>
            <option value="0">----</option>
            <option value="USA" <?php selected($sel_v, '1') ?> >USA</option>
            <option value="Russia" <?php selected($sel_v, 'Russia') ?> >Russia</option>
            <option value="Ukraine" <?php selected($sel_v, 'Ukraine') ?> >Ukraine</option>
            </select></p>
        <p>Town<select name="extra[town]"/>
            <?php $sel_v = get_post_meta($post->ID, 'town', 1); ?>
            <option value="0">----</option>
            <option value="Kiev" <?php selected($sel_v, 'Kiev') ?> >Kiev</option>
            <option value="Poltava" <?php selected($sel_v, 'Poltava') ?> >Poltava</option>
            <option value="Kharkov" <?php selected($sel_v, 'Kharkov') ?> >Kharkov</option>
            </select></p>

            <input type="file" name="my_image_upload" id="my_image_upload"  multiple="false" />

            <input type="hidden" name="custom_fields_nonce" value="<?php echo wp_create_nonce( plugin_basename(__FILE__), 'myplugin_noncename' ); ?>"/>

        <?php }


    static function custom_fields_photo($post)
    {
//        $id = get_post_meta($post->ID,id);
//        print_r( $post->ID);
//          $photo[]=get_attached_file($post->ID+1));
         echo do_shortcode( '[gallery]' );
    }
}