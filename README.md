# WooCommerce + Tailwind CSS v4 + Vite Boilerplate

Welkom bij de **WooCommerce Tailwind Boilerplate**! Dit starter-thema is speciaal ontworpen om snel, modulair en met moderne frontend tools een professionele WooCommerce webshop te bouwen.

Geen logge standaard WordPress templates of verouderde styling meer: je hebt volledige controle met **Tailwind CSS v4**, **Vite** (Hot Module Replacement) en configureerbare **Design Tokens**.

---

## 📋 Inhoudsopgave
1. [Vereisten](#-vereisten)
2. [Installatie & Setup](#-installatie--setup)
3. [Ontwikkelen (Development Workflow)](#-ontwikkelen-development-workflow)
4. [Mappenstructuur & Thema-architectuur](#-mappenstructuur--thema-architectuur)
5. [Hoe pas je het thema aan?](#-hoe-pas-je-het-thema-aan)
   - [1. Logo instellen](#1-logo-instellen)
   - [2. Homepage Hero Banner beheren](#2-homepage-hero-banner-beheren)
   - [3. Kleuren, Typografie & Tokens wijzigen](#3-kleuren-typografie--tokens-wijzigen)
   - [4. WooCommerce Templates stylen](#4-woocommerce-templates-stylen)
6. [Tips & Veelgemaakte Fouten](#-tips--veelgemaakte-fouten)

---

## Vereisten

Zorg dat je het volgende op je computer hebt geïnstalleerd:
* **[LocalWP](https://localwp.com/)** (of een andere lokale webserver zoals XAMPP/MAMP).
* **[Node.js](https://nodejs.org/)** (versie 18 of hoger) en `npm`.
* **WordPress** met de **WooCommerce** plugin geïnstalleerd en geactiveerd.

---

## Installatie & Setup

Volg deze stappen als je de repo hebt gekloond of gedownload:

### Stap 1: Plaats het thema in WordPress
Plaats de map `woo-tailwind-boilerplate` in je WordPress installatie onder:
```text
wp-content/themes/woo-tailwind-boilerplate
```

### Stap 2: Installeer de Node dependencies
Open je terminal, navigeer naar de themamap en installeer alle benodigde pakketten (Vite, Tailwind v4, etc.):
```bash
cd "/pad/naar/wp-content/themes/woo-tailwind-boilerplate"
npm install
```

### Stap 3: Activeer het thema in WordPress
1. Open je WordPress Dashboard in de browser.
2. Ga naar **Weergave > Thema's** (*Appearance > Themes*).
3. Activeer **Woo Tailwind Boilerplate**.
4. Zorg dat de **WooCommerce** plugin aanstaat.

---

## Ontwikkelen (Development Workflow)

Er zijn twee belangrijke npm commando's die je gebruikt tijdens het werken:

| Commando | Wat doet het? | Wanneer gebruik je het? |
| :--- | :--- | :--- |
| `npm run dev` | Start de **Vite development server** (`localhost:5173`). Je CSS en JS wijzigingen worden **direct live** (zonder pagina te herladen) getoond in je browser dankzij Hot Module Replacement (HMR). | Tijdens het ontwerpen en coderen. |
| `npm run build` | Compileert en optimaliseert alle CSS en JS naar geminificeerde bestanden in de map `/dist`. | Als je klaar bent, het thema wilt inleveren of live zet op een server. |

> [!TIP]
> **Hoe werkt de automatische Vite koppeling?**  
> In [inc/vite.php](file:///inc/vite.php) detecteert het thema automatisch of `npm run dev` draait. Zo ja, dan laadt hij de assets live via Vite. Draait het niet? Dan laadt WordPress automatisch de gecompileerde bestanden uit `/dist`.

---

## 📂 Mappenstructuur & Thema-architectuur

Hieronder zie je de belangrijkste bestanden en hun doel:

```text
woo-tailwind-boilerplate/
├── assets/
│   ├── css/
│   │   └── main.css            # Belangrijkste styling: Design tokens, Tailwind @theme & utilities
│   └── js/
│       └── main.js             # Clientside interactie (bijv. mobiel menu, cart drawer slide-over)
├── dist/                       # Gegenereerde productiebestanden (na npm run build)
├── inc/
│   ├── customizer.php          # WordPress Customizer instellingen (zoals de Hero banner)
│   ├── navigation.php          # Menu fallback handlers & custom nav helpers
│   ├── vite.php                # Koppeling tussen PHP en Vite (HMR / Dist loader)
│   └── woocommerce.php         # WooCommerce hooks, AJAX cart fragments & helpers
├── template-parts/
│   └── cart-drawer.php         # Slide-over winkelwagen drawer
├── woocommerce/                # Overrides van WooCommerce templates
│   ├── archive-product.php     # Overzicht / Shop pagina
│   ├── content-product.php     # Individuele productkaart in het grid
│   └── content-single-product.php # Product detailpagina
├── footer.php                  # Footer met USP's, menu en betaalicoontjes
├── front-page.php              # Homepage template (75vh Banner + Laatste Producten)
├── functions.php               # Thema setup & inladen van helpers
├── header.php                  # Header met topbar, navigatie en AJAX cart count
└── index.php                   # Fallback blog/archief template
```

---

## Hoe pas je het thema aan?

### 1. Logo instellen
1. Ga in het WordPress Dashboard naar **Weergave > Aanpassen** (*Appearance > Customize*).
2. Klik op **Site-identiteit > Logo selecteren**.
3. Upload je logo. Het thema zorgt er via [header.php](file:///header.php) en [footer.php](file:///footer.php) automatisch voor dat de afbeelding perfect schaalt zonder de header te vervormen.
4. *Tip:* Als er geen logo is geüpload, toont het thema automatisch netjes de naam van je webshop in tekstvorm.

---

### 2. Homepage Hero Banner beheren
De homepage beschikt over een responsieve banner van **75vh**:
1. Ga in het WordPress Dashboard naar **Weergave > Aanpassen > Homepage Hero Banner**.
2. **Banner Afbeelding**: Upload een scherpe foto (bijv. 1920x1080 of 2560x1440).
3. **CTA Knop Tekst**: Voer de knoptekst in (bijv. *"Bekijk Nieuwste Collectie"* of *"Lees Meer"*).
4. **CTA Knop Link (URL)**: Plak hier de link van het specifieke product of een infopagina. *(Als je dit leeg laat, linkt de knop automatisch naar de Shop)*.
5. De banner heeft een ingebouwde zachte schaduw aan de onderkant, zodat de knop altijd optimaal afsteekt tegen de afbeelding.

---

### 3. Kleuren, Typografie & Tokens wijzigen
In plaats van overal willekeurige hex-kleuren te gebruiken, werkt dit thema met een **Design Token Systeem** in [assets/css/main.css](file:///assets/css/main.css):

```css
:root {
    /* Hoofdkleur (bijv. knoppen, header accenten) */
    --color-primary: #0f172a;        /* Slate 900 */
    --color-primary-hover: #1e293b;

    /* Accentkleur (bijv. prijzen, badges, sale) */
    --color-accent: #2563eb;         /* Royal Blue 600 */

    /* Knoppen en randen afronding */
    --radius-btn: 0.5rem;            /* 8px */
    --radius-card: 1rem;             /* 16px */
}
```
Pas hier de variabelen aan naar jouw gewenste huisstijl en alle Tailwind utilities (`bg-primary`, `text-accent`, `.btn-primary`, `.card`) passen zich direct automatisch aan!

---

### 4. WooCommerce Templates stylen
Wil je een template aanpassen? 
* **Productkaart in het overzicht:** Bewerk [woocommerce/content-product.php](file:///woocommerce/content-product.php).
* **Product detailpagina:** Bewerk [woocommerce/content-single-product.php](file:///woocommerce/content-single-product.php).
* **Dynamisch Laatste Producten grid op de homepage:** Zie [front-page.php](file:///front-page.php). Dit grid schaalt automatisch:
  - 1 product: gecentreerd 1 kolom.
  - 2 producten: 2 kolommen.
  - 3 producten: 3 kolommen.
  - \>3 producten: toont 3 producten met een CTA-knop *"Naar alle producten"*.

---

## Tips & Veelgemaakte Fouten

* **Mijn CSS verandert niet na het opslaan?**
  * Zorg dat `npm run dev` in je terminal actief is. 
  * Als je klaar bent en `npm run dev` sluit, draai dan altijd eenmalig `npm run build`.
* **Winkelmand update niet live?**
  * Zorg dat WooCommerce geactiveerd is en AJAX Add to Cart is ingeschakeld in de WooCommerce instellingen.
* **Producten worden niet getoond?**
  * Zorg dat je minimaal 1 product hebt gepubliceerd in **Producten > Nieuwe toevoegen** in het WordPress dashboard.

---

Veel succes en plezier met bouwen!
