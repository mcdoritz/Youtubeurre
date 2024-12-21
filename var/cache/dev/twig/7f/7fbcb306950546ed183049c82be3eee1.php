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

/* mediaList.html.twig */
class __TwigTemplate_b75f3c18e425f404e0f9d6957aaf13b6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mediaList.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mediaList.html.twig"));

        // line 3
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 3, $this->source); })()), "archived", [], "any", false, false, false, 3) == true)) {
            // line 4
            $context["title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 5
                yield "        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 5, $this->source); })()), "title", [], "any", false, false, false, 5), "html", null, true);
                yield "<span style=\"font-size:.75em\">, ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 5, $this->source); })()), "type", [], "any", false, false, false, 5) == 0)) ? ("playlist ") : ("chaîne "));
                yield " archivée</span>
    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
        } else {
            // line 8
            $context["title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
                // line 9
                yield "        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 9, $this->source); })()), "title", [], "any", false, false, false, 9), "html", null, true);
                yield "<span style=\"font-size:.75em\">, ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 9, $this->source); })()), "type", [], "any", false, false, false, 9) == 0)) ? ("playlist ") : ("chaîne "));
                yield " active</span>
    ";
                yield from [];
            })())) ? '' : new Markup($tmp, $this->env->getCharset());
        }
        // line 13
        $context["page_title"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 13, $this->source); })()), "title", [], "any", false, false, false, 13), "html", null, true);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "mediaList.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 14
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 14, $this->source); })()), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 16
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

        // line 17
        yield "
    <h2>";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 18, $this->source); })()), "html", null, true);
        yield "</h2>

    ";
        // line 20
        if ( !Twig\Extension\CoreExtension::testEmpty((isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 20, $this->source); })()))) {
            // line 21
            yield "
        <div class=\"mediaList-container\">
            <div class=\"mediaList-poster-container\">
                <img src=\"";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("downloaded/posters/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 24, $this->source); })()), "title", [], "any", false, false, false, 24)) . ".jpg")), "html", null, true);
            yield "\"
                     onerror=\"this.onerror=null; this.src='";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("downloaded/default-poster.jpg"), "html", null, true);
            yield "';\"
                     class=\"mediaList-poster mediaList-poster-shadowed\"
                     alt=\"Poster de ";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 27, $this->source); })()), "title", [], "any", false, false, false, 27), "html", null, true);
            yield "\"
                />
                ";
            // line 29
            $context["healthClass"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 29, $this->source); })()), "lastUpdateResult", [], "any", false, false, false, 29) === true)) ? ("good-health") : ((((CoreExtension::getAttribute($this->env, $this->source,             // line 31
(isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 31, $this->source); })()), "lastUpdateResult", [], "any", false, false, false, 31) === false)) ? ("bad-health") : ("unknown-health"))));
            // line 32
            yield "
                ";
            // line 33
            $context["healthText"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 33, $this->source); })()), "lastUpdateResult", [], "any", false, false, false, 33) === true)) ? ("GOOD") : ((((CoreExtension::getAttribute($this->env, $this->source,             // line 35
(isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 35, $this->source); })()), "lastUpdateResult", [], "any", false, false, false, 35) === false)) ? ("BAD") : ("UNKNOWN"))));
            // line 36
            yield "
                <button class=\"pill-button ";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["healthClass"]) || array_key_exists("healthClass", $context) ? $context["healthClass"] : (function () { throw new RuntimeError('Variable "healthClass" does not exist.', 37, $this->source); })()), "html", null, true);
            yield "\">
                    ";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["healthText"]) || array_key_exists("healthText", $context) ? $context["healthText"] : (function () { throw new RuntimeError('Variable "healthText" does not exist.', 38, $this->source); })()), "html", null, true);
            yield " HEALTH
                </button>
            </div>
            <div>
                <h3>Caractéristiques :</h3>
                <ul class=\"carac-sett-list\">
                    <li>Url : <a href=\"";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 44, $this->source); })()), "url", [], "any", false, false, false, 44), "html", null, true);
            yield "\" target=\"_blank\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 44, $this->source); })()), "url", [], "any", false, false, false, 44), "html", null, true);
            yield "</a>&#8599;</li>
                    <li>Contient ";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 45, $this->source); })()), "totalVideos", [], "any", false, false, false, 45), "html", null, true);
            yield " vidéo";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 45, $this->source); })()), "totalVideos", [], "any", false, false, false, 45) > 1)) ? ("s") : (""));
            yield "</li>
                    <li>";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 46, $this->source); })()), "downloadedVideos", [], "any", false, false, false, 46), "html", null, true);
            yield " vidéos ont été téléchargées</li>
                    <li>";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 47, $this->source); })()), "deletedVideos", [], "any", false, false, false, 47), "html", null, true);
            yield " vidéos ont été supprimées</li>
                    <li>Dernier scan :
                        ";
            // line 49
            yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 49, $this->source); })()), "updatedAt", [], "any", false, false, false, 49))) ? ("jamais fait") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("le " . $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source,             // line 51
(isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 51, $this->source); })()), "updatedAt", [], "any", false, false, false, 51), "j F Y à H\\hi")) . (((CoreExtension::getAttribute($this->env, $this->source,             // line 52
(isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 52, $this->source); })()), "lastUpdateResult", [], "any", false, false, false, 52) == true)) ? (" avec succès") : (" mais a échoué !"))), "html", null, true)));
            // line 53
            yield "
                    </li>
                </ul>
                <h3>Réglages :</h3>
                <ul class=\"carac-sett-list\">
                    <li>Téléchargement des ";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 58, $this->source); })()), "xLastVideos", [], "any", false, false, false, 58), "html", null, true);
            yield " dernières vidéos</li>
                    <li>
                        ";
            // line 60
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 60, $this->source); })()), "deleteAfter", [], "any", false, false, false, 60) > 0)) ? ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 60, $this->source); })()), "deleteAfter", [], "any", false, false, false, 60) > 1)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("Supprimer les vidéos téléchargées après " . CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 60, $this->source); })()), "deleteAfter", [], "any", false, false, false, 60)) . " jours"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("Supprimer les vidéos téléchargées après " . CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 60, $this->source); })()), "deleteAfter", [], "any", false, false, false, 60)) . " jour"), "html", null, true)))) : ("Les vidéos ne sont jamais supprimées"));
            yield "
                    </li>
                    <li>Cronjob : ";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 62, $this->source); })()), "cronjob", [], "any", false, false, false, 62), "html", null, true);
            yield "</li>
                    <li>Qualité : ";
            // line 63
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 63, $this->source); })()), "quality", [], "any", false, false, false, 63) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 63, $this->source); })()), "quality", [], "any", false, false, false, 63) . "/3"), "html", null, true)) : ("Audio seulement"));
            yield "</li>
                    <li>Chemin de téléchargement : ";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 64, $this->source); })()), "path", [], "any", false, false, false, 64), "html", null, true);
            yield "</li>
                </ul>
                <p>
                    <a href=\"#\" class=\"button download-button\">Scanner</a>
                    <a href=\"";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("edit.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 68, $this->source); })()), "id", [], "any", false, false, false, 68)]), "html", null, true);
            yield "\" class=\"button edit-button\">Modifier</a>
                    <a href=\"";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("arch.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 69, $this->source); })()), "id", [], "any", false, false, false, 69)]), "html", null, true);
            yield "\" class=\"button arch-button\" id=\"arch-button\">";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 69, $this->source); })()), "archived", [], "any", false, false, false, 69) == "true")) ? ("Activer") : ("Archiver"));
            yield "</a>
                    <a href=\"";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 70, $this->source); })()), "id", [], "any", false, false, false, 70)]), "html", null, true);
            yield "\" class=\"button del-button\" id=\"del-button\">Supprimer</a>
                </p>
                <p style=\"margin-top:4em\">
                    <a href=\"";
            // line 73
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 73, $this->source); })()), "archived", [], "any", false, false, false, 73) == "true")) ? ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("index.archived")) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("index")));
            yield "\" class=\"button add-button\">Revenir ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 73, $this->source); })()), "archived", [], "any", false, false, false, 73) == "true")) ? ("aux archives") : ("à l'index"));
            yield "</a>
                </p>
            </div>
        </div>


        <!-- Modales -->
        <div id=\"confirm-popup-arch\" class=\"popup-overlay\" style=\"display: none;\">
            <div class=\"popup-content\">
                <p>Confirmer ";
            // line 82
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["mediaList"]) || array_key_exists("mediaList", $context) ? $context["mediaList"] : (function () { throw new RuntimeError('Variable "mediaList" does not exist.', 82, $this->source); })()), "archived", [], "any", false, false, false, 82) == "true")) ? ("l'activation") : ("l'archivage"));
            yield " ?</p>
                <button id=\"arch-yes\" class=\"button\">Oui</button>
                <button id=\"arch-no\" class=\"button\">Non</button>
            </div>
        </div>

        <div id=\"confirm-popup-delete\" class=\"popup-overlay\" style=\"display: none;\">
            <div class=\"popup-content\">
                <p>Confirmer la suppression ?</p>
                <button id=\"delete-yes\" class=\"button\">Oui</button>
                <button id=\"delete-no\" class=\"button\">Non</button>
            </div>
        </div>

        <script>
            // Modale Archivage
            document.addEventListener(\"DOMContentLoaded\", function() {
                const archButton = document.getElementById('arch-button');
                const popupArch = document.getElementById('confirm-popup-arch');
                const archYes = document.getElementById('arch-yes');
                const archNo = document.getElementById('arch-no');

                archButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Empêche le lien par défaut
                    popupArch.style.display = 'flex';
                });

                archYes.addEventListener('click', function() {
                    // Rediriger ou exécuter une action ici
                    window.location.href = archButton.href; // Exemple pour suivre le lien
                });

                archNo.addEventListener('click', function() {
                    popupArch.style.display = 'none'; // Cache la popup
                });
            });

            // Modale Delete
            document.addEventListener(\"DOMContentLoaded\", function() {
                const delButton = document.getElementById('del-button');
                const popupDelete = document.getElementById('confirm-popup-delete');
                const deleteYes = document.getElementById('delete-yes');
                const deleteNo = document.getElementById('delete-no');

                delButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Empêche le lien par défaut
                    popupDelete.style.display = 'flex';
                });

                deleteYes.addEventListener('click', function() {
                    // Rediriger ou exécuter une action ici
                    window.location.href = delButton.href; // Exemple pour suivre le lien
                });

                deleteNo.addEventListener('click', function() {
                    popupDelete.style.display = 'none'; // Cache la popup
                });
            });
        </script>



    ";
        } else {
            // line 145
            yield "        <p>Vide</p>
    ";
        }
        // line 147
        yield "
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
        return "mediaList.html.twig";
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
        return array (  345 => 147,  341 => 145,  275 => 82,  261 => 73,  255 => 70,  249 => 69,  245 => 68,  238 => 64,  234 => 63,  230 => 62,  225 => 60,  220 => 58,  213 => 53,  211 => 52,  210 => 51,  209 => 49,  204 => 47,  200 => 46,  194 => 45,  188 => 44,  179 => 38,  175 => 37,  172 => 36,  170 => 35,  169 => 33,  166 => 32,  164 => 31,  163 => 29,  158 => 27,  153 => 25,  149 => 24,  144 => 21,  142 => 20,  137 => 18,  134 => 17,  121 => 16,  97 => 14,  86 => 1,  80 => 13,  70 => 9,  68 => 8,  58 => 5,  56 => 4,  54 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% if mediaList.archived == true %}
    {% set title %}
        {{ mediaList.title }}<span style=\"font-size:.75em\">, {{ mediaList.type == 0 ? 'playlist ' : 'chaîne ' }} archivée</span>
    {% endset %}
{% else %}
    {% set title %}
        {{ mediaList.title }}<span style=\"font-size:.75em\">, {{ mediaList.type == 0 ? 'playlist ' : 'chaîne ' }} active</span>
    {% endset %}
{% endif %}

{% set page_title %} {{ mediaList.title }}{% endset %}
{% block title %} {{ title }}{% endblock %}

{% block body %}

    <h2>{{ title }}</h2>

    {% if mediaList is not empty %}

        <div class=\"mediaList-container\">
            <div class=\"mediaList-poster-container\">
                <img src=\"{{ asset('downloaded/posters/' ~ mediaList.title ~ '.jpg') }}\"
                     onerror=\"this.onerror=null; this.src='{{ asset('downloaded/default-poster.jpg') }}';\"
                     class=\"mediaList-poster mediaList-poster-shadowed\"
                     alt=\"Poster de {{ mediaList.title }}\"
                />
                {% set healthClass = mediaList.lastUpdateResult is same as(true)
                    ? 'good-health'
                    : (mediaList.lastUpdateResult is same as(false) ? 'bad-health' : 'unknown-health') %}

                {% set healthText = mediaList.lastUpdateResult is same as(true)
                    ? 'GOOD'
                    : (mediaList.lastUpdateResult is same as(false) ? 'BAD' : 'UNKNOWN') %}

                <button class=\"pill-button {{ healthClass }}\">
                    {{ healthText }} HEALTH
                </button>
            </div>
            <div>
                <h3>Caractéristiques :</h3>
                <ul class=\"carac-sett-list\">
                    <li>Url : <a href=\"{{ mediaList.url }}\" target=\"_blank\">{{ mediaList.url }}</a>&#8599;</li>
                    <li>Contient {{ mediaList.totalVideos }} vidéo{{ mediaList.totalVideos > 1 ? 's' : '' }}</li>
                    <li>{{ mediaList.downloadedVideos }} vidéos ont été téléchargées</li>
                    <li>{{ mediaList.deletedVideos }} vidéos ont été supprimées</li>
                    <li>Dernier scan :
                        {{ mediaList.updatedAt is empty
                        ? 'jamais fait'
                        : 'le ' ~ mediaList.updatedAt|date(\"j F Y à H\\\\hi\") ~
                        (mediaList.lastUpdateResult == true ? ' avec succès' : ' mais a échoué !')
                        }}
                    </li>
                </ul>
                <h3>Réglages :</h3>
                <ul class=\"carac-sett-list\">
                    <li>Téléchargement des {{ mediaList.xLastVideos }} dernières vidéos</li>
                    <li>
                        {{ mediaList.deleteAfter > 0 ? mediaList.deleteAfter > 1 ? 'Supprimer les vidéos téléchargées après ' ~ mediaList.deleteAfter ~ ' jours' : 'Supprimer les vidéos téléchargées après ' ~ mediaList.deleteAfter ~ ' jour' : 'Les vidéos ne sont jamais supprimées' }}
                    </li>
                    <li>Cronjob : {{ mediaList.cronjob }}</li>
                    <li>Qualité : {{ mediaList.quality > 0 ? mediaList.quality ~ '/3' : 'Audio seulement' }}</li>
                    <li>Chemin de téléchargement : {{ mediaList.path }}</li>
                </ul>
                <p>
                    <a href=\"#\" class=\"button download-button\">Scanner</a>
                    <a href=\"{{ path('edit.mediaList', {id: mediaList.id}) }}\" class=\"button edit-button\">Modifier</a>
                    <a href=\"{{ path('arch.mediaList', {id: mediaList.id}) }}\" class=\"button arch-button\" id=\"arch-button\">{{  mediaList.archived == 'true' ? 'Activer' : 'Archiver' }}</a>
                    <a href=\"{{ path('delete.mediaList', {id: mediaList.id}) }}\" class=\"button del-button\" id=\"del-button\">Supprimer</a>
                </p>
                <p style=\"margin-top:4em\">
                    <a href=\"{{  mediaList.archived == 'true' ? path('index.archived') : path('index') }}\" class=\"button add-button\">Revenir {{ mediaList.archived == 'true' ? 'aux archives' : 'à l\\'index' }}</a>
                </p>
            </div>
        </div>


        <!-- Modales -->
        <div id=\"confirm-popup-arch\" class=\"popup-overlay\" style=\"display: none;\">
            <div class=\"popup-content\">
                <p>Confirmer {{ mediaList.archived == 'true' ? 'l\\'activation' : 'l\\'archivage' }} ?</p>
                <button id=\"arch-yes\" class=\"button\">Oui</button>
                <button id=\"arch-no\" class=\"button\">Non</button>
            </div>
        </div>

        <div id=\"confirm-popup-delete\" class=\"popup-overlay\" style=\"display: none;\">
            <div class=\"popup-content\">
                <p>Confirmer la suppression ?</p>
                <button id=\"delete-yes\" class=\"button\">Oui</button>
                <button id=\"delete-no\" class=\"button\">Non</button>
            </div>
        </div>

        <script>
            // Modale Archivage
            document.addEventListener(\"DOMContentLoaded\", function() {
                const archButton = document.getElementById('arch-button');
                const popupArch = document.getElementById('confirm-popup-arch');
                const archYes = document.getElementById('arch-yes');
                const archNo = document.getElementById('arch-no');

                archButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Empêche le lien par défaut
                    popupArch.style.display = 'flex';
                });

                archYes.addEventListener('click', function() {
                    // Rediriger ou exécuter une action ici
                    window.location.href = archButton.href; // Exemple pour suivre le lien
                });

                archNo.addEventListener('click', function() {
                    popupArch.style.display = 'none'; // Cache la popup
                });
            });

            // Modale Delete
            document.addEventListener(\"DOMContentLoaded\", function() {
                const delButton = document.getElementById('del-button');
                const popupDelete = document.getElementById('confirm-popup-delete');
                const deleteYes = document.getElementById('delete-yes');
                const deleteNo = document.getElementById('delete-no');

                delButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Empêche le lien par défaut
                    popupDelete.style.display = 'flex';
                });

                deleteYes.addEventListener('click', function() {
                    // Rediriger ou exécuter une action ici
                    window.location.href = delButton.href; // Exemple pour suivre le lien
                });

                deleteNo.addEventListener('click', function() {
                    popupDelete.style.display = 'none'; // Cache la popup
                });
            });
        </script>



    {% else %}
        <p>Vide</p>
    {% endif %}

{% endblock %}
", "mediaList.html.twig", "/home/florian/PhpstormProjects/Dorizonerr/app/templates/mediaList.html.twig");
    }
}
