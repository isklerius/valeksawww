# PHP 8.4 Compatibility Audit Report

## Scope and method

The initial audit was report-only. A scoped second pass has now applied only the fixes listed in the section below. No configuration credentials, database schema, routing, dependency, generated-cache, upload, or database files were modified. The audit was performed on branch `php84-compatibility-audit`.

The repository contains approximately 2,095 source candidates after excluding `.vs`, generated template caches, uploads, vendor-like/generated paths, and other non-source artifacts: 2,054 `.php` files and 41 `.inc` files. Static searches and contextual inspection were used. Static results include legacy bundled libraries and should not be treated as proof that every path is loaded by the application.

The working tree already contained unrelated `.vs` metadata changes before this audit. Those files were not modified.

## Files changed

- `PHP84_COMPATIBILITY_REPORT.md` — updated with the second-pass results.
- The 11 application source files listed in the “Second pass applied fixes” section.

## Known fixes checked

The requested known fixes were checked as repository context:

- `config.php` uses `mysqli`.
- `lib/adodb.functions.php` uses `SET COLLATION_CONNECTION = 'utf8_general_ci'`.
- `lib/classes/class.module.inc.php`, `lib/classes/class.content.inc.php`, and `modules/AdvancedContent/contenttype.Content2.php` contain `__construct()` wrappers.
- `modules/Search/PorterStemmer.class.php` contains bracket string offsets in the inspected obsolete-offset location.
- `include.php` does **not** fully match the stated known-fix set: line 63 still calls removed `set_magic_quotes_runtime(false)`.
- `lib/adodb_lite/adodbSQL_drivers/mysqli/mysqli_driver.inc` has `__construct()` for `mysqli_driver_ResultSet`, but the parent connection class still declares the PHP 4-style `mysqli_driver_ADOConnection()` constructor without `__construct()`.

## Findings suitable for a subsequent high-confidence fix pass

### 1. Removed curly-brace string/array offsets

Static scan found approximately 134 candidates in 21 files. This count includes false positives and requires filtering regex quantifiers and braces inside strings. Confirmed executable examples include:

- `admin/listmodules.php:308` — `$moduleName{0}`
- `admin/listtags.php:68` — `$moduleName{0}`
- `lib/classes/class.admintheme.inc.php:1763` — `$moduleName{0}`
- `lib/filemanager/ImageManager/Classes/IM.php:125` — `$angle{0}`
- `modules/CGExtensions/lib/class.POP3_Base.php:563,661,715,721,724` — string offsets
- `modules/CGExtensions/lib/http/class.http.php:1303` — `$cookieDomain{0}`
- `modules/Printing/tcpdf/barcodes.php:295,306` — string/array offsets

**Proposed change:** replace only confirmed executable offset syntax with square brackets, preserving regex quantifiers and string contents. Do not bulk-replace braces.

### 2. PHP 4-style constructors

A static class/method-name comparison identified 48 likely old-style constructors without a `__construct()` wrapper. The list includes:

- `lib/adodb_lite/adodb-xmlschema.inc.php:945` — `dbQuerySet`
- `lib/adodb_lite/adodb.inc.php:187` — `ADOConnection`
- `lib/adodb_lite/adodbSQL_drivers/mysql/mysql_driver.inc:404` — `mysql_driver_ResultSet`
- `lib/adodb_lite/adodbSQL_drivers/postgres/postgres_driver.inc:411` — `postgres_driver_ResultSet`
- `lib/adodb_lite/adodbSQL_drivers/postgres64/postgres64_driver.inc:408` — `postgres64_driver_ResultSet`
- `lib/adodb_lite/adodbSQL_drivers/postgres7/postgres7_driver.inc:413` — `postgres7_driver_ResultSet`
- `lib/adodb_lite/adodbSQL_drivers/postgres8/postgres8_driver.inc:412` — `postgres8_driver_ResultSet`
- `lib/classes/class.admintheme.inc.php:32` — `AdminTheme`
- `lib/classes/class.content.inc.php:2366` — `ContentProperties`
- `lib/classes/class.globalcontent.inc.php:34` — `GlobalContent`
- `lib/classes/class.group.inc.php:33` — `Group`
- `lib/filemanager/ImageManager/Classes/ImageEditor.php:18` — `ImageEditor`
- `lib/filemanager/ImageManager/Classes/ImageManager.php:16` — `ImageManager`
- `lib/filemanager/ImageManager/Classes/Thumbnail.php:19` — `Thumbnail`
- `lib/smarty/Config_File.class.php:38` — `Config_File`
- `lib/xajax/xajax_core/legacy.inc.php:28` — `legacyXajax`
- `lib/xajax/xajax_core/xajaxPluginManager.inc.php:28` — `xajaxPluginManager`
- `modules/AdvancedContent/AdvancedContent.module.php:16` — `AdvancedContent`
- `modules/CGExtensions/class.cgextensions.tools.php:3` — `cgextensions_tools`
- `modules/FileManager/dunzip.php:51` — `dUnzip2`
- `modules/FileManager/untgz.php:15,324,508,549,590` — `archive`, `tar_file`, `gzip_file`, `bzip_file`, `zip_file`
- `modules/nuSOAP/classes/class.soap_fault.php:14` — `soap_fault`
- `modules/nuSOAP/classes/class.soap_server.php:17` — `soap_server`
- `modules/nuSOAP/classes/class.soap_val.php:17` — `soapval`
- `modules/nuSOAP/classes/class.wsdl.php:13` — `wsdl`
- `modules/nuSOAP/classes/class.wsdlcache.php:13` — `wsdlcache`
- `modules/nuSOAP/classes/class.xmlschema.php:17` — `XMLSchema`
- `modules/nuSOAP/classes/nusoap.php:921,1007,1910,3049,4080,5813,6420` — duplicated bundled nuSOAP classes
- `modules/Search/action.dosearch.php:4` — `SearchItemCollection`
- `modules/Search/PorterStemmer.class.php:21` — `PorterStemmer`
- `modules/TemplateExternalizer/TemplateExternalizer.module.php:24` — `TemplateExternalizer`
- `modules/TinyMCE/TinyMCE.module.php:25` — `TinyMCE`
- `modules/TinyMCE/.../SpellChecker.php:10` — `SpellChecker`
- `modules/TinyMCE/.../JSON.php:26,362` — JSON reader classes
- `pma/libraries/bfShapeFiles/ShapeFile.lib.php:36,315` — bundled PMA classes
- `pma/libraries/php-gettext/gettext.php:36` and `streams.php:48,84,145` — bundled gettext classes

The static list may include classes whose same-name method is not an active constructor or classes loaded only under older compatibility paths. Each candidate must be inspected before adding a wrapper. Constructor argument preservation and parent/child behavior must be verified first.

### 3. Invalid direct parent constructor calls

Direct old-style parent calls remain in the bundled nuSOAP code:

- `modules/nuSOAP/classes/class.nu_soapclient.php:93` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.soap_fault.php:49` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.soap_parser.php:59` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.soap_server.php:169` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.soap_transport_http.php:50` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.soap_val.php:73` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.wsdl.php:62` — `parent::nusoap_base()`
- `modules/nuSOAP/classes/class.xmlschema.php:57` — `parent::nusoap_base()`
- Equivalent calls also occur in `modules/nuSOAP/classes/nusoap.php`.

**Proposed change:** add a safe wrapper to the parent only after confirming the parent class and duplicate bundled definitions are loaded consistently. Do not mechanically rewrite all child calls.

### 4. Removed functions

Counts below are static matches in source candidates and include bundled libraries, comments, and some non-executed compatibility branches:

| API | Matches | Files | Assessment |
|---|---:|---:|---|
| `each()` | 10 | 5 | Removed in PHP 8.0; executable CMSMailer/TCPDF/core loops require careful foreach conversion. |
| `create_function()` | 6 | 1 | Removed in PHP 8.0; all matches are in bundled TCPDF in the core-source exclusion scan. |
| `split()`/`spliti()` | 20 | 16 | Removed in PHP 7.0; delimiter semantics must be preserved with `preg_split()` or `explode()`. |
| `ereg`/`eregi` family | 43 | 17 | Removed in PHP 7.0; POSIX regex syntax differs from PCRE and requires per-call review. |
| `mysql_*` | 142 | 26 | Removed in PHP 7.0; most are the legacy ADOdb MySQL driver and cannot be replaced by changing names only. |
| `mcrypt_*` | 72 | 9 | Removed in PHP 7.2; `modules/CGExtensions/lib/class.cge_encrypt.php` is a concrete runtime risk. |
| `money_format()` | 0 | 0 | No matches found. |
| `utf8_encode/decode` | 17 | 10 | Deprecated in PHP 8.2; used by legacy xajax/nuSOAP/TinyMCE code. Replacement requires encoding-contract review. |
| magic-quotes APIs | 32 | 15 | Includes comments/documentation; executable `set_magic_quotes_runtime` and ADOdb calls remain. |

Representative core findings:

- `include.php:63` — `set_magic_quotes_runtime(false)`; removed and must be handled in the next pass.
- `lib/adodb_lite/adodb-xmlschema.inc.php:1291-1292,2312` — `get_magic_quotes_runtime()` / `set_magic_quotes_runtime()`.
- `lib/adodb_lite/adodbSQL_drivers/mysqli/mysqli_driver.inc:197` — `get_magic_quotes_gpc()` remains in a live path.
- `lib/content.functions.php:333` — `each()`.
- `modules/CMSMailer/phpmailer/class.phpmailer.php:1647` and `class.smtp.php:388,417` — `each()`.
- `lib/misc.functions.php:252,260,265,267` — ereg/split family.
- `admin/editcss.php:386` — `split()`.
- `modules/CGExtensions/lib/class.cge_encrypt.php:12-40` — mcrypt encryption API.

Bundled phpMyAdmin/PMA and TCPDF matches were not automatically changed because they are third-party code and their loading paths and version compatibility require separate validation.

### 5. `count()` / `sizeof()` candidates

A broad scan found many calls on variables, including calls that are safe because the value was initialized as an array or guarded by `is_array()`. Examples requiring contextual review include:

- `admin/listcontent.php:694` — `count($mypages)` in a compound condition.
- `admin/listcontent.php:1138` — `count($pagelist)`.
- `admin/listcssassoc.php:236` — `count($cssassoc)`.
- `admin/listgroups.php:71,73,76` — `count($grouplist)`.
- `lib/adodb_lite/...` — multiple `sizeof()` calls on database structures.

The user-listed null-safe correction in `lib/page.functions.php` is treated as pre-existing. No blind replacement is proposed. Each remaining call needs surrounding initialization and intended false/null behavior reviewed before changing it.

### 6. Dynamic properties

A static assignment scan found approximately 6,292 `$this->property = ...` assignments across 425 files. This is not a count of undeclared properties: the legacy CMS, Smarty, ADOdb, modules, and plugins intentionally use inherited and dynamic state. The scan identified likely risk areas including:

- `lib/content.functions.php` — Smarty-derived configuration/runtime properties.
- `lib/adodb_lite/*` — ADOdb runtime state fields.
- CMS module and plugin classes — extension-defined properties.
- Bundled third-party libraries — dynamic state and compatibility fields.

No `#[AllowDynamicProperties]` attribute was added. A safe fix requires comparing every property assignment against declarations and parent classes, then declaring only known finite properties. Broad attributes would hide defects and risk plugin compatibility.

### 7. Built-in interface return types

Two application classes implement `ArrayAccess`:

- `lib/classes/class.cms_config.php`
- `lib/classes/class.cms_variables.php`

Their `offsetExists`, `offsetGet`, `offsetSet`, and `offsetUnset` methods have legacy signatures without return types. PHP 8.1+ may emit return-type compatibility deprecations. The compatibility-branch proposal is to add `#[\\ReturnTypeWillChange]` to these legacy methods after checking the project’s minimum supported PHP behavior. No strict return types were added in this report-only pass.

Other matches included unrelated interfaces in bundled phpMyAdmin and plugin code; they require separate scope decisions.

### 8. Optional parameters before required parameters

A broad text scan found approximately 934 signature candidates across 266 files, with many false positives caused by multiple optional parameters and default values. Concrete legacy nuSOAP examples include:

- `modules/nuSOAP/classes/nusoap.php:2288` — `sendHTTPS($data, $timeout=0, $response_timeout=30, $cookies)`.

Required parameters after optional parameters are deprecated/problematic in modern PHP. Do not reorder APIs without verifying all call sites. Prefer a legacy-compatible default only when the intended missing-value behavior is clear and all callers tolerate it.

## mysqli audit

`lib/adodb_lite/adodbSQL_drivers/mysqli/mysqli_driver.inc` has several positive compatibility behaviors:

- It uses `mysqli_init`, `mysqli_real_connect`, `mysqli_query`, and `mysqli_result` functions.
- It distinguishes `false` query failure from `true` non-result statements before constructing a recordset.
- The `mysqli_driver_ResultSet` constructor was converted to `__construct()`.

Remaining risks:

- `mysqli_driver_ADOConnection()` at line 17 is still a PHP 4-style constructor. Under PHP 8 it will not be invoked automatically as a constructor, so connection initialization may fail unless the ADOdb base lifecycle invokes it explicitly.
- Query calls use `@mysqli_query`; this suppresses diagnostics. The driver does call its error callback when a query returns `false`, but runtime behavior should be tested with failed SQL and connection failure.
- `mysqli_num_rows`, `mysqli_num_fields`, fetch, and seek calls assume a valid `mysqli_result` after the `false`/`true` branches. This is probably correct for SELECT results but needs runtime coverage.
- `get_magic_quotes_gpc()` remains in the driver’s `QMagic` path and is removed in PHP 8.
- The old MySQL driver remains in the tree with many `mysql_*` calls. The active configured driver is mysqli, but fallback/configuration paths should be checked.

## Syntax validation

Requested commands could not be executed because no PHP executable (`php`, `php8.4`, or `php.exe`) is available in the environment. Therefore:

- PHP syntax failures: **not determined**.
- No syntax failures are claimed or inferred from the static scan.
- Required next validation, using PHP 8.4.23, is:

```text
find . -type f -name '*.php' -print0 | xargs -0 -n1 php -l
find . -type f \( -name '*.php' -o -name '*.inc' -o -name '*.module.php' \) -print0 | xargs -0 -n1 php -l
```

Generated caches, uploads, logs, secrets, and database dumps should remain excluded from validation.

## Potentially unsafe findings intentionally not changed

- Automated conversion of `ereg`/`eregi` to PCRE: POSIX and PCRE syntax/escaping differ.
- Automated conversion of `split`/`spliti`: delimiter and limit behavior must be preserved.
- `mysql_*` migration: the application already has an ADOdb abstraction and changing the bundled driver directly could alter database behavior.
- `mcrypt_*` replacement: requires selecting an equivalent cipher, mode, padding, IV, and ciphertext compatibility strategy.
- `utf8_encode/decode` replacement: requires knowing the actual input encoding.
- PHP 4 constructor wrappers: duplicate bundled classes and inheritance make mechanical insertion unsafe.
- Dynamic-property declarations: requires class-by-class and plugin-by-plugin analysis.
- Optional-before-required signatures: requires call-site verification.
- Bundled phpMyAdmin, PMA, TCPDF, nuSOAP, PHPMailer, Smarty, xajax, and TinyMCE changes: third-party compatibility changes should be isolated and tested rather than mixed into core fixes.

## Remaining runtime risks

1. Removed magic-quotes runtime calls can produce fatal errors on entry and XML schema paths.
2. The mysqli ADOdb connection constructor may not initialize under PHP 8.
3. Legacy `each`, `create_function`, `split`, ereg-family, mysql, and mcrypt calls can fail when their modules or code paths load.
4. PHP 8.2+ dynamic-property deprecations may become visible in module/plugin execution.
5. ArrayAccess return-type deprecations may appear during class loading or interface use.
6. Database error suppression may obscure mysqli connection/query failures.
7. Legacy encoding helpers may be deprecated or unavailable depending on installed extensions.
8. Syntax and runtime behavior remain unverified because PHP 8.4.23 is not installed in the audit environment.

## Recommended next pass

After review of this report, apply only individually verified mechanical fixes in a separate implementation step, starting with executable curly offsets, the remaining mysqli connection constructor, `set_magic_quotes_runtime`, and narrowly scoped `each()`/`split()`/ereg calls. Run PHP 8.4.23 syntax checks before and after each group, then perform application smoke tests for bootstrap, login, content rendering, database reads/writes, module loading, mail, and file management.

## Second pass applied fixes

The following high-confidence changes were applied on branch `php84-compatibility-audit`:

- `admin/listmodules.php` — changed executable `$moduleName{0}` to `$moduleName[0]`.
- `admin/listtags.php` — changed executable `$moduleName{0}` to `$moduleName[0]`.
- `lib/classes/class.admintheme.inc.php` — changed executable `$moduleName{0}` to `$moduleName[0]`.
- `lib/filemanager/ImageManager/Classes/IM.php` — changed executable `$angle{0}` to `$angle[0]`.
- `modules/CGExtensions/lib/class.POP3_Base.php` — changed five executable string offsets from curly-brace syntax to square-bracket syntax.
- `modules/CGExtensions/lib/http/class.http.php` — changed executable `$cookieDomain{0}` to `$cookieDomain[0]`.
- `modules/Printing/tcpdf/barcodes.php` — changed all confirmed executable string and nested array offsets in the restricted file from curly-brace syntax to square-bracket syntax; regex quantifiers and quoted-string braces were not changed.
- `include.php` — removed the runtime call to `set_magic_quotes_runtime(false)` without replacing it with another setting.
- `lib/adodb_lite/adodbSQL_drivers/mysqli/mysqli_driver.inc` — replaced the live `get_magic_quotes_gpc()` call with `false`, preserving the existing `qstr()` escaping flow; added a zero-argument `__construct()` wrapper forwarding to `mysqli_driver_ADOConnection()`.
- `lib/classes/class.cms_config.php` — added `#[\\ReturnTypeWillChange]` before all four legacy ArrayAccess methods.
- `lib/classes/class.cms_variables.php` — added `#[\\ReturnTypeWillChange]` before all four legacy ArrayAccess methods.

### Skipped in this second pass

The following were intentionally not changed because they were outside the requested scope or require additional behavioral review:

- `lib/adodb_lite/adodb-xmlschema.inc.php` magic-quotes save/restore calls.
- Other PHP 4-style constructors and direct legacy parent constructor calls.
- nuSOAP, TCPDF `create_function()`, `ereg`/`eregi`, `split`/`spliti`, `mysql_*`, and `mcrypt_*` usages.
- Dynamic properties, optional-before-required signatures, nullable/scalar `count()` candidates, bundled phpMyAdmin/PMA code, database schema, configuration credentials, routing, and `.htaccess`.

### Second-pass validation

- `git diff --check` passed using `core.whitespace=cr-at-eol` to preserve the legacy files’ existing CRLF line endings.
- `php -l` was not run because no PHP executable is available in the environment. Syntax validation with PHP 8.4.23 remains required.
- No commit was created.
