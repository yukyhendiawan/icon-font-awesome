<?php

/**
 * Template part for displaying information about Block Icons.
 *
 * @package     Block Icons
 * @author      Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 * @link        https://developer.wordpress.org/reference/functions/add_theme_page/
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Get the path to the plugin directory
$plugin_dir = plugin_dir_path(__FILE__);

// Search for the template file inside the plugin directory
$template_sidebar_information = $plugin_dir . 'sidebar-information.php';

?>
<section class="wrap mytheme-information mytheme">
    <!-- Header top theme info -->
    <header class="top-theme-info">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2>
                        <?php echo esc_html(ICON_FONT_AWESOME_NAME); ?>
                        <span><?php echo esc_html(ICON_FONT_AWESOME_VERSION); ?></span>
                    </h2>
                    <p><?php esc_html_e('Block: Icon Font Awesome is a Gutenberg plugin specifically designed to facilitate displaying a collection of Font Awesome.', 'icon-font-awesome'); ?></p>
                </div>
                <div class="col-right">
                    <a href="https://www.buymeacoffee.com/yukyhendiawan" target="_blank" class="donate">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M441-120v-86q-53-12-91.5-46T293-348l74-30q15 48 44.5 73t77.5 25q41 0 69.5-18.5T587-356q0-35-22-55.5T463-458q-86-27-118-64.5T313-614q0-65 42-101t86-41v-84h80v84q50 8 82.5 36.5T651-650l-74 32q-12-32-34-48t-60-16q-44 0-67 19.5T393-614q0 33 30 52t104 40q69 20 104.5 63.5T667-358q0 71-42 108t-104 46v84h-80Z" />
                        </svg>
                        <?php esc_html_e('Donate', 'icon-font-awesome'); ?>
                    </a>
                    <a href="https://www.upwork.com/freelancers/~01559dc6ef8a329c82" target="_blank" class="hire-developer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M320-240 80-480l240-240 57 57-184 184 183 183-56 56Zm320 0-57-57 184-184-183-183 56-56 240 240-240 240Z" />
                        </svg>
                        <?php esc_html_e('Hire Developer!', 'icon-font-awesome'); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation tabs -->
    <nav class="tabs">
        <div class="mycontainer">
            <div class="myrow">
                <div class="box-menu">
                    <ul>
                        <li><a myid="usage-guide" class="active" href="#usage-guide"><?php esc_html_e('Usage Guide ', 'icon-font-awesome'); ?></a></li>
                        <li><a myid="report" href="#report"><?php esc_html_e('Report ', 'icon-font-awesome'); ?></a></li>
                        <li><a myid="changelog" href="#changelog"><?php esc_html_e('Changelog ', 'icon-font-awesome'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Usage Guide -->
    <section class="content usage-guide data-content">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2>
                        <?php
                        esc_html_e('Usage Guide ', 'icon-font-awesome');
                        ?>
                    </h2>
                    <p><?php esc_html_e('Welcome to our plugin page! With this plugin, you can easily add icons to your content through the Gutenberg Editor. Here are simple steps to get started:', 'icon-font-awesome'); ?></p>

                    <br />

                    <ol>
                        <li>
                            <strong><?php esc_html_e('Access the Gutenberg Editor:', 'icon-font-awesome'); ?></strong>
                            <br />
                            <?php esc_html_e('Open your WordPress editor and select or create a post or page using Gutenberg.', 'icon-font-awesome'); ?>
                        </li>
                        <li>
                            <strong><?php esc_html_e('Go to Gutenberg Media Category Block and Choose an Font Awesome:', 'icon-font-awesome'); ?></strong>
                            <br />
                            <?php esc_html_e('Locate the "Media Category" option within the Gutenberg block. Choose the "Font Awesome" and select an icon that suits your needs.', 'icon-font-awesome'); ?>
                        </li>
                        <li>
                            <strong><?php esc_html_e('Click the Icon Library Button:', 'icon-font-awesome'); ?></strong>
                            <br />
                            <?php esc_html_e('After selecting the Icon Font Awesome category, click the "Icon Library" button to open the available icon library.', 'icon-font-awesome'); ?>
                        </li>
                        <li>
                            <strong><?php esc_html_e('Choose an Icon:', 'icon-font-awesome'); ?></strong>
                            <br />
                            <?php esc_html_e('Select one icon from the library. Click on the desired icon to choose it.', 'icon-font-awesome'); ?>
                        </li>
                    </ol>
                    <?php
                    $plugin_dir = plugins_url('icon-font-awesome/');

                    $image_url = $plugin_dir;
                    ?>

                    <p><?php esc_html_e( 'Step 1: Please select the Icon Font Awesome block in the Gutenberg Editor.', 'icon-font-awesome' ); ?></p>

                    <img class="step" src="<?php echo esc_url($image_url . 'assets/images/step1.png'); ?>" alt="step1">

                    <p><?php esc_html_e( 'Step 2: Click on the Icon Library icon.', 'icon-font-awesome' ); ?></p>

                    <img class="step" src="<?php echo esc_url($image_url . 'assets/images/step2.png'); ?>" alt="step2">

                    <p><?php esc_html_e( 'Step 3: Choose one of the icons.', 'icon-font-awesome' ); ?></p>

                    <img class="step" src="<?php echo esc_url($image_url . 'assets/images/step3.png'); ?>" alt="step3">

                    <p><?php esc_html_e('Now, you are ready to effortlessly add icons to your content through the Gutenberg Editor. If you have any further questions or need additional assistance, feel free to contact us. Happy creating!"', 'icon-font-awesome'); ?></p>
                </div>
                <div class="col-right ads">
                    <?php
                    // Ensure the template file exists before loading
                    if (file_exists($template_sidebar_information)) {
                        // Include the template file
                        include $template_sidebar_information;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Bug Report -->
    <section class="content report data-content hide">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2><?php esc_html_e('Bug Report', 'icon-font-awesome'); ?></h2>
                    <?php
                    $text_report1 = sprintf(
                        /* translators: %s: Theme name */
                        __('If you encounter any bugs or issues while using the Plugin, we encourage you to promptly report them to us. Reporting bugs is a crucial step in ensuring quick updates and fixes, allowing you to continue experiencing optimal performance with our WordPress Plugin.', 'icon-font-awesome'),
                    );
                    ?>

                    <p><?php echo esc_html($text_report1); ?></p>

                    <br />

                    <p><?php esc_html_e('Below are the steps to report a bug:', 'icon-font-awesome'); ?></p>

                    <br />

                    <ol>
                        <li>
                            <strong><?php esc_html_e( 'Identify the Bug:', 'icon-font-awesome' ); ?></strong>
                            <?php esc_html_e('Please try to identify and understand the issue or bug you encounter. Ensure to record details on how the bug manifests and its impact on the use of the Plugin.', 'icon-font-awesome'); ?>
                        </li>

                        <li>
                            <strong><?php esc_html_e( 'Provide Detailed Explanation:', 'icon-font-awesome' ); ?></strong>
                            <?php esc_html_e('When reporting the bug to us, offer a clear and detailed explanation of the problem you are facing.', 'icon-font-awesome'); ?>
                        </li>

                        <li>
                            <strong><?php esc_html_e( 'Report the Bug:', 'icon-font-awesome' ); ?></strong>
                            <?php echo esc_html__('Kindly report the bug through ', 'icon-font-awesome'); ?> 
                            <a href="https://wordpress.org/support/plugin/icon-font-awesome/" target="_blank">
                                <?php esc_html_e('The Block: Icon Font Awesome WordPress Plugin forum', 'icon-font-awesome'); ?>
                            </a> 
                            <?php echo esc_html__(' or via ', 'icon-font-awesome'); ?>
                            <a href="https://github.com/yukyhendiawan/icon-font-awesome/issues" target="_blank">
                                <?php esc_html_e('GitHub Issues.', 'icon-font-awesome'); ?>
                            </a>
                            <?php echo esc_html__('Include the information you have gathered about the bug in your report.', 'icon-font-awesome'); ?>
                        </li>

                    </ol>

                    <br />

                    <p><?php esc_html_e('Your support and cooperation in reporting the bug are highly appreciated. We will make every effort to address the bug as quickly as possible so that you can continue enjoying the use of the Plugin without disruption.', 'icon-font-awesome'); ?></p>

                    <br />

                    <p>
                        <?php esc_html_e('Best regards,', 'icon-font-awesome'); ?> <br />
                        <?php esc_html_e('Yuky Hendiawan', 'icon-font-awesome'); ?>
                    </p>
                </div>
                <div class="col-right ads">
                    <?php
                    // Ensure the template file exists before loading
                    if (file_exists($template_sidebar_information)) {
                        // Include the template file
                        include $template_sidebar_information;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Changelog -->
    <section class="content changelog data-content hide">
        <div class="mycontainer">
            <div class="myrow">
                <div class="col-left">
                    <h2><?php esc_html_e('Changelog', 'icon-font-awesome'); ?></h2>
                    <div class="changelog-info">
                        <ul>
                            <li>
                                <span class="new"></span>
                                <?php esc_html_e('New', 'icon-font-awesome'); ?>
                            </li>
                            <li>
                                <span class="update"></span>
                                <?php esc_html_e('Update', 'icon-font-awesome'); ?>
                            </li>
                            <li>
                                <span class="fix"></span>
                                <?php esc_html_e('Fix', 'icon-font-awesome'); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="changelog-list">
                        <section>
                            <h2><?php esc_html_e('Version: 1.1.0', 'icon-font-awesome'); ?><span><?php esc_html_e('Released on April 17, 2024', 'icon-font-awesome'); ?></span></h2>
                            <div class="release">
                                <ul>
                                    <li>
                                        <span class="update"></span>
                                        <?php esc_html_e('New Icons', 'icon-font-awesome'); ?>
                                    </li>                                    
                                </ul>
                            </div>
                        </section>                            
                        <section>
                            <h2><?php esc_html_e('Version: 1.0.0', 'icon-font-awesome'); ?><span><?php esc_html_e('Released on March 23, 2024', 'icon-font-awesome'); ?></span></h2>
                            <div class="release">
                                <ul>
                                    <li>
                                        <span class="new"></span>
                                        <?php esc_html_e('Initial release', 'icon-font-awesome'); ?>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-right ads">
                    <?php
                    // Ensure the template file exists before loading
                    if (file_exists($template_sidebar_information)) {
                        // Include the template file
                        include $template_sidebar_information;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</section>