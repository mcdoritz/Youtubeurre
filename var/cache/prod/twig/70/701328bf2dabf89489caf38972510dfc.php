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
class __TwigTemplate_a72b8802d7720f2e3c7e8a1902a94f6b extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "index/add_mediaList.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Index des playlists et des chaînes";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "    <h3>Playlists</h3>
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
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["playLists"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["playlist"]) {
            // line 18
            yield "        <tr>
            <td><a href=\"";
            // line 19
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 19)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "title", [], "any", false, false, false, 19), "html", null, true);
            yield "</a></td>
            <td><a href=\"";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 20)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "url", [], "any", false, false, false, 20), "html", null, true);
            yield "</a></td>
            <td><a href=\"";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 21)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "cronjob", [], "any", false, false, false, 21), "html", null, true);
            yield "</a></td>
            <td><a href=\"";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "id", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "deleteAfter", [], "any", false, false, false, 22) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["playlist"], "deleteAfter", [], "any", false, false, false, 22) . " jours"), "html", null, true)) : ("Infini"));
            yield "</a></td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['playlist'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "        <tr>
            <td colspan=\"4\" class=\"table-last-tr\"> <a href=\"#\" class=\"button add-button\">Ajouter</a></td>
        </tr>
        </tbody>
    </table>

    <h3>Chaînes</h3>
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
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["channels"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 43
            yield "            <tr>
                <td><a href=\"";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 44)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "title", [], "any", false, false, false, 44), "html", null, true);
            yield "</a></td>
                <td><a href=\"";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 45)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "url", [], "any", false, false, false, 45), "html", null, true);
            yield "</a></td>
                <td><a href=\"";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 46)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "cronjob", [], "any", false, false, false, 46), "html", null, true);
            yield "</a></td>
                <td><a href=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show.mediaList", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "id", [], "any", false, false, false, 47)]), "html", null, true);
            yield "\" class=\"table-link\">";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "deleteAfter", [], "any", false, false, false, 47) > 0)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["channel"], "deleteAfter", [], "any", false, false, false, 47) . " jours"), "html", null, true)) : ("Infini"));
            yield "</a></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['channel'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        yield "            <tr>
                <td colspan=\"4\" class=\"table-last-tr\"> <a href=\"#\" class=\"button add-button\">Ajouter</a></td>
            </tr>
        </tbody>
    </table>

    <div class=\"encadre\">
        <div class=\"sous-encadre\">
            <h3>Ajouter une playlist</h3>
            <form action=\"#\" method=\"POST\">
                <div class=\"form-group\">
                    <label for=\"url\">URL</label>
                    <input type=\"url\" id=\"url\" name=\"url\" placeholder=\"https://example.com\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"cron\">Cronjob</label>
                    <input type=\"text\" id=\"cron\" name=\"cron\" placeholder=\"Exemple: 30 3 * * *\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"age\">Âge Max des vidéos (en jours)</label>
                    <input type=\"number\" id=\"age\" name=\"age\" placeholder=\"Âge max en jours\" required>
                </div>
                <div class=\"form-group\">
                    <p></p>
                    <button type=\"submit\" style=\"background-color: darkgreen; color: white; border: none; padding: 5px 10px; cursor: pointer;\">✅ Ajouter</button>
                </div>
            </form>
        </div>
        <div class=\"sous-encadre\">
            <h3>Ajouter une chaîne</h3>
            <form action=\"#\" method=\"POST\">
                <div class=\"form-group\">
                    <label for=\"url\">URL</label>
                    <input type=\"url\" id=\"url\" name=\"url\" placeholder=\"https://example.com\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"cron\">Cronjob</label>
                    <input type=\"text\" id=\"cron\" name=\"cron\" placeholder=\"Exemple: 30 3 * * *\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"age\">Âge Max des vidéos (en jours)</label>
                    <input type=\"number\" id=\"age\" name=\"age\" placeholder=\"Âge max en jours\" required>
                </div>
                <div class=\"form-group\">
                    <p></p>
                    <button type=\"submit\" style=\"background-color: darkgreen; color: white; border: none; padding: 5px 10px; cursor: pointer;\">✅ Ajouter</button>
                </div>
            </form>
        </div>
    </div>
";
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
        return array (  174 => 50,  163 => 47,  157 => 46,  151 => 45,  145 => 44,  142 => 43,  138 => 42,  119 => 25,  108 => 22,  102 => 21,  96 => 20,  90 => 19,  87 => 18,  83 => 17,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "index/add_mediaList.html.twig", "/home/florian/PhpstormProjects/Dorizonerr/app/templates/index/add_mediaList.html.twig");
    }
}
