<?php
/**
 * ملف دمج البورتفوليو مع ووردبريس و ACF
 * Portfolio WordPress & ACF Integration
 */

// إنشاء Custom Post Types للمشاريع والمهارات
function create_portfolio_post_types() {
    // تسجيل نوع منشور للمشاريع
    register_post_type('portfolio_project', array(
        'labels' => array(
            'name' => 'المشاريع',
            'singular_name' => 'مشروع',
            'add_new' => 'إضافة مشروع جديد',
            'add_new_item' => 'إضافة مشروع جديد',
            'edit_item' => 'تعديل المشروع',
            'new_item' => 'مشروع جديد',
            'view_item' => 'عرض المشروع',
            'search_items' => 'البحث في المشاريع',
            'not_found' => 'لم يتم العثور على مشاريع',
            'not_found_in_trash' => 'لا توجد مشاريع في المهملات'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true
    ));

    // تسجيل نوع منشور للمهارات
    register_post_type('portfolio_skill', array(
        'labels' => array(
            'name' => 'المهارات',
            'singular_name' => 'مهارة',
            'add_new' => 'إضافة مهارة جديدة',
            'add_new_item' => 'إضافة مهارة جديدة',
            'edit_item' => 'تعديل المهارة',
            'new_item' => 'مهارة جديدة',
            'view_item' => 'عرض المهارة',
            'search_items' => 'البحث في المهارات',
            'not_found' => 'لم يتم العثور على مهارات',
            'not_found_in_trash' => 'لا توجد مهارات في المهملات'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-awards',
        'show_in_rest' => true
    ));
}
add_action('init', 'create_portfolio_post_types');

// إنشاء حقول ACF للصفحة الرئيسية
function create_portfolio_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        
        // حقول Hero Section
        acf_add_local_field_group(array(
            'key' => 'group_hero_section',
            'title' => 'Hero Section',
            'fields' => array(
                array(
                    'key' => 'field_hero_title',
                    'label' => 'العنوان الرئيسي',
                    'name' => 'hero_title',
                    'type' => 'text',
                    'default_value' => 'مرحباً، أنا أحمد محمد',
                ),
                array(
                    'key' => 'field_hero_description',
                    'label' => 'الوصف',
                    'name' => 'hero_description',
                    'type' => 'textarea',
                    'default_value' => 'مطور فرونت إند متخصص في إنشاء تجارب ويب تفاعلية وحديثة',
                ),
                array(
                    'key' => 'field_hero_button_text',
                    'label' => 'نص الزر',
                    'name' => 'hero_button_text',
                    'type' => 'text',
                    'default_value' => 'تصفح أعمالي',
                ),
                array(
                    'key' => 'field_hero_button_link',
                    'label' => 'رابط الزر',
                    'name' => 'hero_button_link',
                    'type' => 'text',
                    'default_value' => '#projects',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-portfolio.php',
                    ),
                ),
            ),
        ));

        // حقول About Section
        acf_add_local_field_group(array(
            'key' => 'group_about_section',
            'title' => 'About Section',
            'fields' => array(
                array(
                    'key' => 'field_about_image',
                    'label' => 'الصورة الشخصية',
                    'name' => 'about_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_about_description',
                    'label' => 'نبذة عني',
                    'name' => 'about_description',
                    'type' => 'textarea',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-portfolio.php',
                    ),
                ),
            ),
        ));

        // حقول Contact Section
        acf_add_local_field_group(array(
            'key' => 'group_contact_section',
            'title' => 'Contact Section',
            'fields' => array(
                array(
                    'key' => 'field_contact_email',
                    'label' => 'البريد الإلكتروني',
                    'name' => 'contact_email',
                    'type' => 'email',
                ),
                array(
                    'key' => 'field_contact_phone',
                    'label' => 'رقم الهاتف',
                    'name' => 'contact_phone',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_social_links',
                    'label' => 'روابط التواصل الاجتماعي',
                    'name' => 'social_links',
                    'type' => 'repeater',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_social_name',
                            'label' => 'اسم المنصة',
                            'name' => 'social_name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_social_url',
                            'label' => 'الرابط',
                            'name' => 'social_url',
                            'type' => 'url',
                        ),
                        array(
                            'key' => 'field_social_icon',
                            'label' => 'الأيقونة',
                            'name' => 'social_icon',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-portfolio.php',
                    ),
                ),
            ),
        ));

        // حقول المشاريع
        acf_add_local_field_group(array(
            'key' => 'group_project_fields',
            'title' => 'تفاصيل المشروع',
            'fields' => array(
                array(
                    'key' => 'field_project_description',
                    'label' => 'وصف المشروع',
                    'name' => 'project_description',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_project_link',
                    'label' => 'رابط المشروع',
                    'name' => 'project_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_github_link',
                    'label' => 'رابط GitHub',
                    'name' => 'github_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_project_technologies',
                    'label' => 'التقنيات المستخدمة',
                    'name' => 'project_technologies',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'portfolio_project',
                    ),
                ),
            ),
        ));

        // حقول المهارات
        acf_add_local_field_group(array(
            'key' => 'group_skill_fields',
            'title' => 'تفاصيل المهارة',
            'fields' => array(
                array(
                    'key' => 'field_skill_icon',
                    'label' => 'أيقونة المهارة',
                    'name' => 'skill_icon',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_skill_progress',
                    'label' => 'نسبة الإتقان (%)',
                    'name' => 'skill_progress',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 100,
                    'default_value' => 50,
                ),
                array(
                    'key' => 'field_skill_description',
                    'label' => 'وصف المهارة',
                    'name' => 'skill_description',
                    'type' => 'textarea',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'portfolio_skill',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'create_portfolio_acf_fields');

// وظائف جلب البيانات من ACF
function get_portfolio_data() {
    $portfolio_data = array();
    
    // جلب بيانات Hero Section
    $portfolio_data['hero'] = array(
        'title' => get_field('hero_title') ?: 'مرحباً، أنا أحمد محمد',
        'description' => get_field('hero_description') ?: 'مطور فرونت إند متخصص في إنشاء تجارب ويب تفاعلية وحديثة',
        'buttonText' => get_field('hero_button_text') ?: 'تصفح أعمالي',
        'buttonLink' => get_field('hero_button_link') ?: '#projects'
    );
    
    // جلب بيانات About Section
    $portfolio_data['about'] = array(
        'image' => get_field('about_image') ?: 'https://via.placeholder.com/200x200/667eea/ffffff?text=صورتي',
        'description' => get_field('about_description') ?: 'مطور فرونت إند بخبرة 5 سنوات في تطوير مواقع الويب والتطبيقات التفاعلية.'
    );
    
    // جلب المهارات
    $skills_query = new WP_Query(array(
        'post_type' => 'portfolio_skill',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    
    $portfolio_data['skills'] = array();
    if ($skills_query->have_posts()) {
        while ($skills_query->have_posts()) {
            $skills_query->the_post();
            $portfolio_data['skills'][] = array(
                'name' => get_the_title(),
                'icon' => get_field('skill_icon') ?: 'https://via.placeholder.com/60x60/667eea/ffffff?text=' . substr(get_the_title(), 0, 2),
                'progress' => get_field('skill_progress') ?: 50,
                'description' => get_field('skill_description') ?: ''
            );
        }
        wp_reset_postdata();
    }
    
    // جلب المشاريع
    $projects_query = new WP_Query(array(
        'post_type' => 'portfolio_project',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    
    $portfolio_data['projects'] = array();
    if ($projects_query->have_posts()) {
        while ($projects_query->have_posts()) {
            $projects_query->the_post();
            $portfolio_data['projects'][] = array(
                'title' => get_the_title(),
                'description' => get_field('project_description') ?: get_the_excerpt(),
                'image' => get_the_post_thumbnail_url() ?: 'https://via.placeholder.com/350x200/667eea/ffffff?text=' . get_the_title(),
                'projectLink' => get_field('project_link') ?: '#',
                'githubLink' => get_field('github_link') ?: '#',
                'technologies' => get_field('project_technologies') ?: ''
            );
        }
        wp_reset_postdata();
    }
    
    // جلب بيانات Contact Section
    $social_links = get_field('social_links') ?: array();
    $portfolio_data['contact'] = array(
        'email' => get_field('contact_email') ?: 'ahmed@example.com',
        'phone' => get_field('contact_phone') ?: '+966 50 123 4567',
        'socialLinks' => $social_links
    );
    
    return $portfolio_data;
}

// إنشاء REST API endpoint لجلب بيانات البورتفوليو
function register_portfolio_api_endpoint() {
    register_rest_route('wp/v2', '/portfolio-data', array(
        'methods' => 'GET',
        'callback' => 'get_portfolio_api_data',
        'permission_callback' => '__return_true'
    ));
}
add_action('rest_api_init', 'register_portfolio_api_endpoint');

function get_portfolio_api_data() {
    return get_portfolio_data();
}

// إضافة JavaScript لتحميل البيانات من ACF
function enqueue_portfolio_scripts() {
    wp_enqueue_script('portfolio-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);
    
    // تمرير البيانات إلى JavaScript
    wp_localize_script('portfolio-script', 'portfolioAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('portfolio_nonce'),
        'apiUrl' => rest_url('wp/v2/portfolio-data')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_portfolio_scripts');

// قالب الصفحة (page-portfolio.php)
function create_portfolio_page_template() {
    $template_content = '
<?php
/*
Template Name: Portfolio Page
*/

get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo(\'charset\'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
</head>
<body <?php body_class(); ?>>

<header class="hero-section">
    <div class="container">
        <h1 id="hero-title"><?php echo get_field(\'hero_title\') ?: \'مرحباً، أنا أحمد محمد\'; ?></h1>
        <p id="hero-description"><?php echo get_field(\'hero_description\') ?: \'مطور فرونت إند متخصص في إنشاء تجارب ويب تفاعلية وحديثة\'; ?></p>
        <a href="<?php echo get_field(\'hero_button_link\') ?: \'#projects\'; ?>" class="btn" id="hero-button"><?php echo get_field(\'hero_button_text\') ?: \'تصفح أعمالي\'; ?></a>
    </div>
</header>

<section id="about" class="about-me-section">
    <div class="container">
        <img src="<?php echo get_field(\'about_image\') ?: \'https://via.placeholder.com/200x200/667eea/ffffff?text=صورتي\'; ?>" alt="صورة شخصية" class="profile-pic" id="about-image">
        <h2 class="section-title">عني</h2>
        <p id="about-description"><?php echo get_field(\'about_description\') ?: \'مطور فرونت إند بخبرة 5 سنوات في تطوير مواقع الويب والتطبيقات التفاعلية.\'; ?></p>
    </div>
</section>

<section id="skills" class="skills-section">
    <div class="container">
        <h2 class="section-title">مهاراتي</h2>
        <div class="skills-grid" id="skills-list">
            <!-- Skills will be loaded here by JavaScript -->
        </div>
    </div>
</section>

<section id="projects" class="projects-section">
    <div class="container">
        <h2 class="section-title">مشاريعي</h2>
        <div class="projects-grid" id="projects-list">
            <!-- Projects will be loaded here by JavaScript -->
        </div>
    </div>
</section>

<section id="contact" class="contact-me-section">
    <div class="container">
        <h2 class="section-title">تواصل معي</h2>
        <p>البريد الإلكتروني: <span id="contact-email"><?php echo get_field(\'contact_email\') ?: \'ahmed@example.com\'; ?></span></p>
        <p>الهاتف: <span id="contact-phone"><?php echo get_field(\'contact_phone\') ?: \'+966 50 123 4567\'; ?></span></p>
        <div class="social-links" id="social-links">
            <!-- Social links will be loaded here by JavaScript -->
        </div>
    </div>
</section>

<script>
// تحديث JavaScript لاستخدام البيانات من ACF
document.addEventListener(\'DOMContentLoaded\', function() {
    // جلب البيانات من API
    fetch(portfolioAjax.apiUrl)
        .then(response => response.json())
        .then(data => {
            // تحديث البيانات الديناميكية
            updatePortfolioData(data);
        })
        .catch(error => {
            console.error(\'خطأ في جلب البيانات:\', error);
            // استخدام البيانات التجريبية في حالة الخطأ
            updatePortfolioData(portfolioData);
        });
});

function updatePortfolioData(data) {
    // تحديث المهارات
    loadSkillsFromData(data.skills);
    // تحديث المشاريع
    loadProjectsFromData(data.projects);
    // تحديث روابط التواصل
    loadSocialLinksFromData(data.contact.socialLinks);
}
</script>

<?php wp_footer(); ?>
</body>
</html>

<?php get_footer(); ?>
    ';
    
    // حفظ القالب في ملف منفصل
    file_put_contents(get_template_directory() . '/page-portfolio.php', $template_content);
}

// تفعيل الوظائف عند تفعيل القالب
add_action('after_setup_theme', 'create_portfolio_page_template');

?>