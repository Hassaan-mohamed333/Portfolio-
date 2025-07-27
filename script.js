// بيانات تجريبية (ستأتي من ACF في ووردبريس)
const portfolioData = {
    hero: {
        title: "مرحباً، أنا أحمد محمد",
        description: "مطور فرونت إند متخصص في إنشاء تجارب ويب تفاعلية وحديثة",
        buttonText: "تصفح أعمالي",
        buttonLink: "#projects"
    },
    about: {
        image: "https://via.placeholder.com/200x200/667eea/ffffff?text=صورتي",
        description: "مطور فرونت إند بخبرة 5 سنوات في تطوير مواقع الويب والتطبيقات التفاعلية. أتخصص في React، Vue.js، وتقنيات الويب الحديثة. أحب إنشاء تجارب مستخدم مميزة وتحويل الأفكار إلى واقع رقمي."
    },
    skills: [
        {
            name: "HTML & CSS",
            icon: "https://via.placeholder.com/60x60/e34c26/ffffff?text=HTML",
            progress: 95
        },
        {
            name: "JavaScript",
            icon: "https://via.placeholder.com/60x60/f7df1e/000000?text=JS",
            progress: 90
        },
        {
            name: "React.js",
            icon: "https://via.placeholder.com/60x60/61dafb/000000?text=React",
            progress: 85
        },
        {
            name: "Vue.js",
            icon: "https://via.placeholder.com/60x60/4fc08d/ffffff?text=Vue",
            progress: 80
        },
        {
            name: "WordPress",
            icon: "https://via.placeholder.com/60x60/21759b/ffffff?text=WP",
            progress: 88
        },
        {
            name: "Sass/SCSS",
            icon: "https://via.placeholder.com/60x60/cf649a/ffffff?text=Sass",
            progress: 92
        }
    ],
    projects: [
        {
            title: "متجر إلكتروني متكامل",
            description: "متجر إلكتروني بتقنية React مع نظام دفع متكامل وإدارة المنتجات",
            image: "https://via.placeholder.com/350x200/667eea/ffffff?text=متجر+إلكتروني",
            projectLink: "https://example.com/project1",
            githubLink: "https://github.com/username/project1"
        },
        {
            title: "تطبيق إدارة المهام",
            description: "تطبيق ويب لإدارة المهام والمشاريع مع واجهة مستخدم حديثة",
            image: "https://via.placeholder.com/350x200/764ba2/ffffff?text=إدارة+المهام",
            projectLink: "https://example.com/project2",
            githubLink: "https://github.com/username/project2"
        },
        {
            title: "موقع شركة تقنية",
            description: "موقع شركة متجاوب مع تصميم حديث وتأثيرات بصرية مميزة",
            image: "https://via.placeholder.com/350x200/2c3e50/ffffff?text=موقع+شركة",
            projectLink: "https://example.com/project3",
            githubLink: "https://github.com/username/project3"
        }
    ],
    contact: {
        email: "ahmed@example.com",
        phone: "+966 50 123 4567",
        socialLinks: [
            {
                name: "LinkedIn",
                url: "https://linkedin.com/in/ahmed",
                icon: "💼"
            },
            {
                name: "GitHub",
                url: "https://github.com/ahmed",
                icon: "🐱"
            },
            {
                name: "Twitter",
                url: "https://twitter.com/ahmed",
                icon: "🐦"
            },
            {
                name: "Facebook",
                url: "https://facebook.com/ahmed",
                icon: "📘"
            }
        ]
    }
};

// وظائف تحميل البيانات
function loadHeroSection() {
    document.getElementById('hero-title').textContent = portfolioData.hero.title;
    document.getElementById('hero-description').textContent = portfolioData.hero.description;
    const heroButton = document.getElementById('hero-button');
    heroButton.textContent = portfolioData.hero.buttonText;
    heroButton.href = portfolioData.hero.buttonLink;
}

function loadAboutSection() {
    document.getElementById('about-image').src = portfolioData.about.image;
    document.getElementById('about-description').textContent = portfolioData.about.description;
}

function loadSkillsSection() {
    const skillsList = document.getElementById('skills-list');
    skillsList.innerHTML = '';
    
    portfolioData.skills.forEach(skill => {
        const skillItem = document.createElement('div');
        skillItem.className = 'skill-item';
        skillItem.innerHTML = `
            <img src="${skill.icon}" alt="${skill.name}" class="skill-icon">
            <div class="skill-name">${skill.name}</div>
            <div class="skill-progress">
                <div class="skill-progress-bar" data-progress="${skill.progress}"></div>
            </div>
        `;
        skillsList.appendChild(skillItem);
    });
    
    // تحريك شريط التقدم
    setTimeout(() => {
        document.querySelectorAll('.skill-progress-bar').forEach(bar => {
            const progress = bar.getAttribute('data-progress');
            bar.style.width = progress + '%';
        });
    }, 500);
}

function loadProjectsSection() {
    const projectsList = document.getElementById('projects-list');
    projectsList.innerHTML = '';
    
    portfolioData.projects.forEach(project => {
        const projectItem = document.createElement('div');
        projectItem.className = 'project-item';
        projectItem.innerHTML = `
            <img src="${project.image}" alt="${project.title}" class="project-image">
            <div class="project-content">
                <h3 class="project-title">${project.title}</h3>
                <p class="project-description">${project.description}</p>
                <div class="project-links">
                    <a href="${project.projectLink}" target="_blank" class="project-link">عرض المشروع</a>
                    <a href="${project.githubLink}" target="_blank" class="project-link">GitHub</a>
                </div>
            </div>
        `;
        projectsList.appendChild(projectItem);
    });
}

function loadContactSection() {
    document.getElementById('contact-email').textContent = portfolioData.contact.email;
    document.getElementById('contact-phone').textContent = portfolioData.contact.phone;
    
    const socialLinks = document.getElementById('social-links');
    socialLinks.innerHTML = '';
    
    portfolioData.contact.socialLinks.forEach(link => {
        const socialLink = document.createElement('a');
        socialLink.href = link.url;
        socialLink.target = '_blank';
        socialLink.className = 'social-link';
        socialLink.textContent = link.icon;
        socialLink.title = link.name;
        socialLinks.appendChild(socialLink);
    });
}

// وظائف تفاعلية إضافية
function smoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

function addScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // إضافة الرسوم المتحركة للعناصر
    document.querySelectorAll('.skill-item, .project-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// تحميل البيانات عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    loadHeroSection();
    loadAboutSection();
    loadSkillsSection();
    loadProjectsSection();
    loadContactSection();
    smoothScroll();
    
    // إضافة الرسوم المتحركة بعد تحميل المحتوى
    setTimeout(addScrollAnimations, 100);
});

// وظيفة لمحاكاة جلب البيانات من ACF (للاستخدام المستقبلي)
async function fetchACFData() {
    // هذه الوظيفة ستستخدم في ووردبريس لجلب البيانات من ACF
    try {
        const response = await fetch('http://localhost/wordpress/wp-json/wp/v2/sec1?slug=sec1');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('خطأ في جلب البيانات:', error);
        return portfolioData; // استخدام البيانات التجريبية في حالة الخطأ
    }
}

// تصدير البيانات للاستخدام في ووردبريس
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { portfolioData, fetchACFData };
}
