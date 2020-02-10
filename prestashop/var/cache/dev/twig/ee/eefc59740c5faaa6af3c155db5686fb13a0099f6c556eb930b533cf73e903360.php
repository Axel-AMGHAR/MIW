<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Improve/Design/Theme/import.html.twig */
class __TwigTemplate_423725dbbff823d8adf5f5f65cce3eb4967e10c3d900182d240b4521a8e9e67b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/import.html.twig", 26);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'import_theme_form_rest' => [$this, 'block_import_theme_form_rest'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Design/Theme/import.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Improve/Design/Theme/import.html.twig"));

        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/import.html.twig", 27);
        // line 29
        $context["layoutTitle"] = (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Theme & Logo", [], "Admin.Navigation.Menu") . " > ") . $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Theme", [], "Admin.Design.Feature"));
        // line 30
        $context["layoutHeaderToolbarBtn"] = ["add" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_themes_import"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new theme", [], "Admin.Design.Feature"), "icon" => "add"], "export" => ["href" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_themes_export_current"), "desc" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export current theme", [], "Admin.Design.Feature"), "icon" => "cloud_download"]];
        // line 26
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 43
    public function block_content($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 44
        echo "  <div class=\"row\">
    <div class=\"col\">
      ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), 'errors');
        echo "
      ";
        // line 47
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), 'form_start');
        echo "
        <div class=\"row justify-content-center\">
          <div class=\"col-xl-10\">
            <div class=\"card\">
              <h3 class=\"card-header\">
                <i class=\"material-icons\">file_copy</i>
                ";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import from your computer", [], "Admin.Design.Feature"), "html", null, true);
        echo "
              </h3>
              <div class=\"card-block row\">
                <div class=\"card-text\">
                  ";
        // line 57
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), "import_from_computer", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Zip file", [], "Admin.Design.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Browse your computer files and select the Zip file for your new theme.", [], "Admin.Design.Help")]);
        // line 60
        echo "
                </div>
              </div>
              <div class=\"card-footer\">
                <div class=\"d-flex justify-content-end\">
                  <button class=\"btn btn-primary\">
                    <i class=\"material-icons\">cloud_upload</i>
                    ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class=\"col-xl-10\">
            <div class=\"card\">
              <h3 class=\"card-header\">
                <i class=\"material-icons\">file_copy</i>
                ";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import from the web", [], "Admin.Design.Feature"), "html", null, true);
        echo "
              </h3>
              <div class=\"card-block row\">
                <div class=\"card-text\">
                  ";
        // line 82
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), "import_from_web", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Archive URL", [], "Admin.Design.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Indicate the complete URL to an online Zip file that contains your new theme. For instance, \"http://example.com/files/theme.zip\".", [], "Admin.Design.Help")]);
        // line 85
        echo "
                </div>
              </div>
              <div class=\"card-footer\">
                <div class=\"d-flex justify-content-end\">
                  <button class=\"btn btn-primary\">
                    <i class=\"material-icons\">cloud_upload</i>
                    ";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class=\"col-xl-10\">
            <div class=\"card\">
              <h3 class=\"card-header\">
                <i class=\"material-icons\">file_copy</i>
                ";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import from FTP", [], "Admin.Design.Feature"), "html", null, true);
        echo "
              </h3>
              <div class=\"card-block row\">
                <div class=\"card-text\">
                  ";
        // line 107
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), "import_from_ftp", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select the archive", [], "Admin.Design.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This selector lists the Zip files that you uploaded in the '/themes' folder.", [], "Admin.Design.Help")]);
        // line 110
        echo "
                </div>
              </div>
              <div class=\"card-footer\">
                <div class=\"d-flex justify-content-end\">
                  <button class=\"btn btn-primary\">
                    <i class=\"material-icons\">cloud_upload</i>
                    ";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 125
        $this->displayBlock('import_theme_form_rest', $context, $blocks);
        // line 128
        echo "
      ";
        // line 129
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), 'form_end');
        echo "
    </div>
  </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 125
    public function block_import_theme_form_rest($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "import_theme_form_rest"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "import_theme_form_rest"));

        // line 126
        echo "          ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["importThemeForm"] ?? $this->getContext($context, "importThemeForm")), 'rest');
        echo "
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/import.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 126,  197 => 125,  183 => 129,  180 => 128,  178 => 125,  167 => 117,  158 => 110,  156 => 107,  149 => 103,  135 => 92,  126 => 85,  124 => 82,  117 => 78,  103 => 67,  94 => 60,  92 => 57,  85 => 53,  76 => 47,  72 => 46,  68 => 44,  59 => 43,  49 => 26,  47 => 30,  45 => 29,  43 => 27,  22 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}

{% extends '@PrestaShop/Admin/layout.html.twig' %}
{% import '@PrestaShop/Admin/macros.html.twig' as ps %}

{% set layoutTitle = 'Theme & Logo'|trans({}, 'Admin.Navigation.Menu') ~ ' > ' ~ 'Theme'|trans({}, 'Admin.Design.Feature') %}
{% set layoutHeaderToolbarBtn = {
  'add': {
    'href': path('admin_themes_import'),
    'desc': 'Add new theme'|trans({}, 'Admin.Design.Feature'),
    'icon': 'add'
  },
  'export': {
    'href': path('admin_themes_export_current'),
    'desc': 'Export current theme'|trans({}, 'Admin.Design.Feature'),
    'icon': 'cloud_download'
  }
} %}

{% block content %}
  <div class=\"row\">
    <div class=\"col\">
      {{ form_errors(importThemeForm) }}
      {{ form_start(importThemeForm) }}
        <div class=\"row justify-content-center\">
          <div class=\"col-xl-10\">
            <div class=\"card\">
              <h3 class=\"card-header\">
                <i class=\"material-icons\">file_copy</i>
                {{ 'Import from your computer'|trans({}, 'Admin.Design.Feature') }}
              </h3>
              <div class=\"card-block row\">
                <div class=\"card-text\">
                  {{ ps.form_group_row(importThemeForm.import_from_computer, {}, {
                    label: 'Zip file'|trans({}, 'Admin.Design.Feature'),
                    help: 'Browse your computer files and select the Zip file for your new theme.'|trans({}, 'Admin.Design.Help')
                  }) }}
                </div>
              </div>
              <div class=\"card-footer\">
                <div class=\"d-flex justify-content-end\">
                  <button class=\"btn btn-primary\">
                    <i class=\"material-icons\">cloud_upload</i>
                    {{ 'Save'|trans({}, 'Admin.Actions') }}
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class=\"col-xl-10\">
            <div class=\"card\">
              <h3 class=\"card-header\">
                <i class=\"material-icons\">file_copy</i>
                {{ 'Import from the web'|trans({}, 'Admin.Design.Feature') }}
              </h3>
              <div class=\"card-block row\">
                <div class=\"card-text\">
                  {{ ps.form_group_row(importThemeForm.import_from_web, {}, {
                    label: 'Archive URL'|trans({}, 'Admin.Design.Feature'),
                    help: 'Indicate the complete URL to an online Zip file that contains your new theme. For instance, \"http://example.com/files/theme.zip\".'|trans({}, 'Admin.Design.Help')
                  }) }}
                </div>
              </div>
              <div class=\"card-footer\">
                <div class=\"d-flex justify-content-end\">
                  <button class=\"btn btn-primary\">
                    <i class=\"material-icons\">cloud_upload</i>
                    {{ 'Save'|trans({}, 'Admin.Actions') }}
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class=\"col-xl-10\">
            <div class=\"card\">
              <h3 class=\"card-header\">
                <i class=\"material-icons\">file_copy</i>
                {{ 'Import from FTP'|trans({}, 'Admin.Design.Feature') }}
              </h3>
              <div class=\"card-block row\">
                <div class=\"card-text\">
                  {{ ps.form_group_row(importThemeForm.import_from_ftp, {}, {
                    label: 'Select the archive'|trans({}, 'Admin.Design.Feature'),
                    help: 'This selector lists the Zip files that you uploaded in the \\'/themes\\' folder.'|trans({}, 'Admin.Design.Help')
                  }) }}
                </div>
              </div>
              <div class=\"card-footer\">
                <div class=\"d-flex justify-content-end\">
                  <button class=\"btn btn-primary\">
                    <i class=\"material-icons\">cloud_upload</i>
                    {{ 'Save'|trans({}, 'Admin.Actions') }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        {% block import_theme_form_rest %}
          {{ form_rest(importThemeForm) }}
        {% endblock %}

      {{ form_end(importThemeForm) }}
    </div>
  </div>
{% endblock %}
", "@PrestaShop/Admin/Improve/Design/Theme/import.html.twig", "C:\\wamp64_2\\www\\MIW\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\import.html.twig");
    }
}
