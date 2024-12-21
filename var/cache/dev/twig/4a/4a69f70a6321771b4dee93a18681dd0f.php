<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* index/add_mediaList.html.twig */
class __TwigTemplate_573ce83ed243d1914658ae85a3d3491b extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "index/add_mediaList.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "index/add_mediaList.html.twig"));

        // line 3
        if (array_key_exists("archive", $context)) {
            // line 4
            $context["page_title"] = new Markup("        Archive des playlists et des chaînes
    ", $this->env->getCharset());
        } else {
            // line 8
            $context["page_title"] = new Markup("        Index des playlists et des chaînes
    ", $this->env->getCharset());
        }
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "index/add_mediaList.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["page_title"]) || array_key_exists("page_title", $context) ? $context["page_title"] : (function () { throw new RuntimeError('Variable "page_title" does not exist.', 13, $this->source); })()), "html", null, true);
        yield " ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 15
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 16
        yield "    ";
        if ( !array_key_exists("archive", $context)) {
            // line 17
            yield "    <h3>Ajouter une chaine ou une playlist</h3>
    <a href=\"";
            // line 18
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add.mediaList");
            yield "\" class=\"button add-button\">Ajouter</a>
    ";
        }
        // line 20
        yield "    <h3>Playlists ";
        yield ((array_key_exists("archive", $context)) ? (" archivées") : (""));
        yield "</h3>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>URL</th>
            <th>Cronjob</th>
            <th>Age Max</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["playLists"]) || array_key_exists("playLists", $context) ? $context["playLists"] : (function () { throw new RuntimeError('Variable "playLists" does not exist.', 31, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["playlist"]) {
            // line 32
            yield "        <tr>
            <td><a href=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 33)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "title", [], "any", false, false, false, 33), "html", null, true);
            yield "</a></td>
            <td><a href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "url", [], "any", false, false, false, 34), "html", null, true);
            yield "</a></td>
            <td><a href=\"";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 35)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "cronjob", [], "any", false, false, false, 35), "html", null, true);
            yield "</a></td>
            <td><a href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 36)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "deleteAfter", [], "any", false, false, false, 36) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "deleteAfter", [], "any", false, false, false, 36) . " jours"), "html", null, true)) : ("Infini"));
            yield "</a></td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['playlist'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "        </tbody>
    </table>

    <h3>Chaînes ";
        // line 42
        yield ((array_key_exists("archive", $context)) ? (" archivées") : (""));
        yield "</h3>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>URL</th>
            <th>Cronjob</th>
            <th>Age Max</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["channels"]) || array_key_exists("channels", $context) ? $context["channels"] : (function () { throw new RuntimeError('Variable "channels" does not exist.', 53, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 54
            yield "            <tr>
                <td><a href=\"";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 55)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "title", [], "any", false, false, false, 55), "html", null, true);
            yield "</a></td>
                <td><a href=\"";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 56)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "url", [], "any", false, false, false, 56), "html", null, true);
            yield "</a></td>
                <td><a href=\"";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 57)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "cronjob", [], "any", false, false, false, 57), "html", null, true);
            yield "</a></td>
                <td><a href=\"";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 58)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "deleteAfter", [], "any", false, false, false, 58) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "deleteAfter", [], "any", false, false, false, 58) . " jours"), "html", null, true)) : ("Infini"));
            yield "</a></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['channel'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        yield "        </tbody>
    </table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "index/add_mediaList.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  230 => 61,  219 => 58,  213 => 57,  207 => 56,  201 => 55,  198 => 54,  194 => 53,  180 => 42,  175 => 39,  164 => 36,  158 => 35,  152 => 34,  146 => 33,  143 => 32,  139 => 31,  124 => 20,  119 => 18,  116 => 17,  113 => 16,  100 => 15,  75 => 13,  64 => 1,  60 => 8,  56 => 4,  54 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% if archive is defined %}
    {% set page_title %}
        Archive des playlists et des chaînes
    {% endset %}
{% else %}
    {% set page_title %}
        Index des playlists et des chaînes
    {% endset %}
{% endif %}

{% block title %} {{ page_title }} {% endblock %}

{% block body %}
    {% if archive is not defined %}
    <h3>Ajouter une chaine ou une playlist</h3>
    <a href=\"{{ path('add.mediaList') }}\" class=\"button add-button\">Ajouter</a>
    {% endif %}
    <h3>Playlists {{ archive is defined ? ' archivées' : '' }}</h3>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>URL</th>
            <th>Cronjob</th>
            <th>Age Max</th>
        </tr>
        </thead>
        <tbody>
        {% for playlist in playLists %}
        <tr>
            <td><a href=\"{{ path('show.mediaList', {id: playlist.id}) }}\" class=\"table-link\">{{ playlist.title }}</a></td>
            <td><a href=\"{{ path('show.mediaList', {id: playlist.id}) }}\" class=\"table-link\">{{ playlist.url }}</a></td>
            <td><a href=\"{{ path('show.mediaList', {id: playlist.id}) }}\" class=\"table-link\">{{ playlist.cronjob }}</a></td>
            <td><a href=\"{{ path('show.mediaList', {id: playlist.id}) }}\" class=\"table-link\">{{ playlist.deleteAfter > 0 ? playlist.deleteAfter ~ ' jours' : 'Infini' }}</a></td>
        </tr>
        {% endfor %}
        </tbody>
    </table>

    <h3>Chaînes {{ archive is defined ? ' archivées' : '' }}</h3>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>URL</th>
            <th>Cronjob</th>
            <th>Age Max</th>
        </tr>
        </thead>
        <tbody>
        {% for channel in channels %}
            <tr>
                <td><a href=\"{{ path('show.mediaList', {id: channel.id}) }}\" class=\"table-link\">{{ channel.title }}</a></td>
                <td><a href=\"{{ path('show.mediaList', {id: channel.id}) }}\" class=\"table-link\">{{ channel.url }}</a></td>
                <td><a href=\"{{ path('show.mediaList', {id: channel.id}) }}\" class=\"table-link\">{{ channel.cronjob }}</a></td>
                <td><a href=\"{{ path('show.mediaList', {id: channel.id}) }}\" class=\"table-link\">{{ channel.deleteAfter > 0 ? channel.deleteAfter ~ ' jours' : 'Infini' }}</a></td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
{% endblock %}
", "index/add_mediaList.html.twig", "/home/florian/PhpstormProjects/Dorizonerr/app/templates/index/add_mediaList.html.twig");
    }
}
