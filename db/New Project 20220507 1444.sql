-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema appsesi
--

CREATE DATABASE IF NOT EXISTS appsesi;
USE appsesi;

--
-- Definition of table `capacidad`
--

DROP TABLE IF EXISTS `capacidad`;
CREATE TABLE `capacidad` (
  `pk_capacidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_ud` int(10) unsigned DEFAULT NULL,
  `capa_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_capacidad`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capacidad`
--

/*!40000 ALTER TABLE `capacidad` DISABLE KEYS */;
INSERT INTO `capacidad` (`pk_capacidad`,`fk_ud`,`capa_descripcion`) VALUES 
 (1,1,'Verificar el montaje de los componentes de arquitectura de hardware siguiendo las especificaciones técnicas de cada fabricante.'),
 (2,2,'Analizar el flujo de las comunicaciones sobre las redes implementadas, según normas y estándares de diseño, administración y operación de la redes de comunicación y seguridad informática.'),
 (3,3,'Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.'),
 (4,4,'Ejecutar el soporte técnico a equipos e infraestructuras de TI según los acuerdos del nivel de operación y políticas de la organización.'),
 (5,5,'Comunicar conceptos, ideas, opiniones, sentimientos y hechos de forma coherente, precisa y clara, en medios presenciales y virtuales, en situaciones relacionadas a su entorno personal y profesional, valorando y utilizando la comunicación oral, sin estereotipos de género u otro, verificando la comprensión del interlocutor.'),
 (6,6,'Utilizar aplicaciones y herramientas informáticas para la búsqueda, comunicación y análisis de información de manera responsable y considerando los principios éticos.'),
 (7,7,'Diseñar redes de sistemas computacionales, mediante el análisis de requerimientos y el costo beneficio que implica la implementación.'),
 (8,8,'Realizar el mantenimiento preventivo y correctivo de equipos de cómputo, según normas y estándares de seguridad.'),
 (9,9,'Diseñar modelos de gestión de base de datos teniendo en cuenta las funciones y arquitectura de las necesidades del negocio.'),
 (10,10,'Realizar modelos o prototipos de aplicaciones y sistemas informáticos, mejorando la infraestructura de negocio y minimizando los riesgos.'),
 (11,11,'Interpretar la información, proveniente de medios físicos y virtuales, relacionados al programa de estudios, proveniente de medios físicos o virtuales utilizando estrategias efectivas de comprensión y organización de la información y comunicándola a través de diferentes formas.'),
 (12,11,'Redactar documentos académicos y técnicos relacionados a su programa de estudios haciendo uso de un lenguaje coherente, respetando la probidad académica y respetando la propiedad intelectual.'),
 (13,12,'Utilizar software de ofimática de acuerdo al programa de estudios, considerando las necesidades de sistematización de la información.'),
 (14,13,'Administrar la infraestructura de servidores de redes y servicios de comunicaciones de acuerdo al manual de procedimientos y operaciones.'),
 (15,14,'Implementar bases de datos que soporten requerimientos e incidentes de la organización, utilizando la metodología adecuada de acuerdo a normas y estándares vigentes.'),
 (16,15,'Elaborar planes de gestión de incidentes utilizando los recursos TIC\'s teniendo en cuenta la continuidad del negocio y políticas de la organización.'),
 (17,16,'Diagnosticar el rendimiento y seguridad de los Servicios de TI y la administración de redes, según normas y estándares vigentes.'),
 (18,17,'Desarrollar componentes de sistemas o servicios de TI de acuerdo a los requerimientos de la empresa y planes de implementación.'),
 (19,18,'Resolver problemas en el desarrollo de software utilizando la metodología adecuada de acuerdo a normas y estándares vigentes.'),
 (20,19,'Desarrollar aplicaciones multi-plataforma a medida utilizando lenguajes de programación de acuerdo a los requerimientos de la empresa y diseño establecido.'),
 (21,20,'Desarrollar proyectos gráficos publicitarios de acuerdo a las especificaciones delineadas por el cliente.'),
 (22,21,'Desarrollar páginas web teniendo en cuenta patrones de navegación y diseño de procesos interactivos actuales.'),
 (23,22,'Desarrollar un plan de comercio para un E-business usando CRM y marketing digital aplicando los fundamentos del comercio electrónico.'),
 (24,23,'Comunicar información personal, conceptos, ideas, sentimientos y hechos, en el idioma inglés, de manera presencial y virtual, aplicando gramática y vocabulario técnico sin estereotipo de género.'),
 (25,24,'Interpretar la información de documentación escrita en el idioma inglés, analizando las ideas principales para usarlos en su desempeño en el ámbito social y laboral vinculado al programa de estudios.'),
 (26,24,'Redactar documentos vinculados al programa de estudios en idioma inglés, relacionando de forma lógica ideas y conceptos, utilizando los recursos pertinentes.'),
 (27,25,'Aplicar principios y valores éticos deontológicos en su contexto social y laboral, respetando las normas del bien común y códigos de ética profesional.'),
 (28,25,'Practicar las relaciones interpersonales democráticas respetando la diversidad y dignidad de las personas, en el marco de los derechos humanos y en la convivencia social y gestionando de forma efectiva los conflictos.'),
 (29,26,'Desarrollar la arquitectura de plataformas web de acuerdo a normas y estándares de calidad, demostrando lógica y buenas prácticas de implementación básica.'),
 (30,27,'Desarrollar modelos y productos multimedia para el diseño de la arquitectura e infraestructura, de acuerdo a los estándares vigentes y tendencias de los fabricantes.'),
 (31,28,'Elaborar productos gráficos editoriales y publicitarios, según requerimientos del cliente, aplicando principios de diseño, armonía y sentido estético.'),
 (32,29,'Desarrollar la arquitectura de aplicaciones móviles nativas e híbridas, teniendo en cuenta las diferentes plataformas móviles y tecnologías actuales.'),
 (33,30,'Diseñar composiciones audiovisuales con calidad profesional para comunicar ideas a nivel visual, utilizando las principales herramientas de edición.'),
 (34,31,'Realizar aplicaciones web utilizando herramientas y framework según las necesidades de la empresa.'),
 (35,32,'Diseñar plataformas móviles orientados a satisfacer necesidades empresariales y tecnológicas, de acuerdo a las especificaciones de la empresa.'),
 (36,33,'Implementar soluciones empresariales ERP, CRM, SCM identificando aspectos críticos y la infraestructura de soporte, acorde a los estándares internacionales.'),
 (37,34,'Identificar situaciones o problemas del proceso productivo o de servicios, considerando los objetivos del área de desempeño.'),
 (38,34,'Plantear alternativas de soluciones a situaciones o problemas del proceso productivo o de servicios, considerando los objetivos del área de desempeño.'),
 (39,35,'Formula planes de negocio identificando procesos y metodología considerando normas administrativas y contables, así como de protección al autor de instancias gubernamentales.'),
 (40,36,'Diseñar un proyecto de innovación tecnológica aplicada que contribuya a la solución de un problema concreto de su área laboral realizando la transferencia tecnológica a la sociedad y teniendo en cuenta los criterios de pertinencia y ética.');
/*!40000 ALTER TABLE `capacidad` ENABLE KEYS */;


--
-- Definition of table `capacidad_logro`
--

DROP TABLE IF EXISTS `capacidad_logro`;
CREATE TABLE `capacidad_logro` (
  `pk_capacidad_logro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_capacidad` int(10) unsigned DEFAULT NULL,
  `calo_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_capacidad_logro`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capacidad_logro`
--

/*!40000 ALTER TABLE `capacidad_logro` DISABLE KEYS */;
INSERT INTO `capacidad_logro` (`pk_capacidad_logro`,`fk_capacidad`,`calo_descripcion`) VALUES 
 (1,1,'Identifica los componentes internos y externos de la arquitectura de hardware para el correcto montaje de acuerdo a las especificaciones del fabricante.'),
 (2,1,'Ensambla los componentes o partes de arquitectura de hardware teniendo en cuenta la seguridad, requerimientos del usuario y especificaciones del fabricante.'),
 (3,1,'Realiza el diagnóstico de las fallas de la arquitectura de hardware y software teniendo en cuenta las especificaciones del fabricante.'),
 (4,1,'Configura la arquitectura de hardware teniendo en cuenta las especificaciones técnicas del fabricante.'),
 (5,2,'Describe los fundamentos de las comunicaciones en las redes, según protocolos TCP/IP.'),
 (6,2,'Verifica el cumplimiento y exigencias de calidad establecidas en las normas y estándares de comunicación en las redes.'),
 (7,2,'Diseña un plan de contingencia teniendo en cuenta la mitigación de los riesgos de seguridad en las redes de comunicaciones.'),
 (9,3,'Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.'),
 (10,3,'Utiliza las herramientas básicas de servicios, seguridad y administración teniendo en cuenta los requerimientos y necesidades del usuario o de la empresa.'),
 (11,3,'Configura la administración de los usuarios, permisos, instalación de aplicaciones, firewall, monitorización y automatización de tareas teniendo en cuenta las políticas de seguridad.'),
 (12,3,'Aplica mecanismos de seguridad de la estructura de información y sistema de archivos, teniendo en cuenta la existencia de programas y usuarios maliciosos.'),
 (13,4,'Establece indicadores para garantizar la calidad en el centro de procesamiento de datos, según las normas, infraestructura y el diseño de los sistemas.'),
 (14,4,'Analiza la infraestructura de TI de un centro de procesamiento de datos, teniendo en cuenta los estándares de calidad de la empresa.'),
 (15,4,'Realiza las acciones de mejora de la calidad en el centro de procesamiento de datos teniendo en cuenta los estándares de calidad de la empresa.'),
 (16,5,'Expresa conceptos, ideas, sentimientos y hechos en forma oral, en situaciones vinculadas a su entorno personal y profesional respetando la interculturalidad lingüística.'),
 (17,5,'Interpreta información de manera oral en situaciones vinculadas a su entorno personal y profesional , utilizando técnicas de comunicación y reconociendo la intención de su interlocutor.'),
 (18,5,'Utiliza estrategias de escucha activa y asertiva en situaciones vinculadas a su entorno personal y profesional, sin estereotipos de género u otros.'),
 (19,5,'Aplica los elementos de la comunicación efectiva vinculados a su entorno personal y laboral, teniendo en cuenta la intención comunicativa.'),
 (20,6,'Utiliza aplicaciones de internet para la búsqueda de la información, aplicando criterios para la selección de información y el respeto a la propiedad intelectual.'),
 (21,6,'Utiliza las herramientas web 2.0 para publicar y compartir presentaciones relacionada a su especialidad.'),
 (22,6,'Utiliza aplicaciones para la comunicación y colaboración de acuerdo a la necesidad de información, con responsabilidad y ética profesional.'),
 (23,7,'Categoriza los requerimientos y componentes de una red de comunicación de datos de acuerdo a las especificaciones técnicas del fabricante.'),
 (24,7,'Relaciona los componentes de una red de comunicación y el tipo de medio de conexión de acuerdo a estándares internacionales que se utilizan para la implementación y normatividad vigente.'),
 (25,7,'Estructura redes de comunicación de datos utilizando herramientas de planificación y topología de acuerdo a los estándares de diseño de arquitectura e infraestructura según requerimientos del usuario.'),
 (26,7,'Ejecuta pruebas técnicas necesarias en la capa de red, tales como enrutamiento, congestión, calidad e interconectividad de acuerdo a procedimientos y normas de seguridad.'),
 (27,8,'Describe las etapas implicadas en un proceso de mantenimiento de equipos informáticos, según las normas de calidad.'),
 (28,8,'Establece las diferencias entre los tipos de mantenimiento, de acuerdo a la normatividad establecida.'),
 (29,8,'Aplica procedimientos en el mantenimiento preventivo y correctivo de equipos informáticos, utilizando las herramientas adecuadas.'),
 (30,9,'Modela los esquemas conceptuales lógicos y físicos teniendo en cuenta reglas de esquemas entidad - relación.'),
 (31,9,'Utiliza T-SQL para las consultas y procedimientos teniendo en cuenta las reglas de sentencias SQL.'),
 (32,9,'Implementa estrategias de seguridad, recuperación, administración de usuarios y automatización de tareas administrativas según reglas de seguridad y responsabilidad.'),
 (33,9,'Realiza la administración de entornos de base de datos, cliente-servidor según las plataformas de los gestores de base de datos.'),
 (34,10,'Analiza procesos de negocio para aplicar los principios fundamentales de la programación orientada a objetos según necesidades del usuario.'),
 (35,10,'Modela diagramas aplicando las técnicas de abstracción, relaciones y asociaciones, herencia, encapsulamiento y polimorfismo mediante casos de usos teniendo en cuenta requerimientos del usuario final.'),
 (36,10,'Diseña aplicaciones de forma robusta, segura y eficiente eligiendo el paradigma de la POO teniendo en cuenta las técnicas del modelado para la solución de problemas.'),
 (37,10,'Implanta la aplicación para la puesta en marcha teniendo en cuenta los requerimientos de la plataforma.'),
 (38,11,'Lee textos y documentación escrita vinculados al programa de estudios haciendo uso de estrategias efectivas de comprensión lectora.'),
 (39,11,'Organiza la información de los textos y documentación escrita relacionados al programa de estudios en gráficos visuales, de manera objetiva.'),
 (40,11,'Interpreta el contenido de los textos leídos vinculados al programa de estudios empleando recursos y estrategias de comprensión lectora.'),
 (41,11,'Explica la información leída en forma oral y escrita, utilizando técnicas y formatos en forma clara y empática'),
 (42,12,'Utiliza las normas en la redacción de documentos académicos y técnicos relacionados a su programa de estudios.'),
 (43,12,'Procesa tipos de fuentes bibliográficas y virtuales asegurando su relevancia, pertinencia, actualidad, confiabilidad y calidad, evitando contenidos irrelevantes.'),
 (44,12,'Redacta documentos académicos y técnicos relacionados a su programa de estudios teniendo en cuenta las propiedades de coherencia, cohesión y estilo, aplicando las normas gramaticales del idioma castellano y usando los formatos respectivos.'),
 (45,13,'Utiliza procesador de textos en la elaboración de documentos, teniendo en cuenta los requerimientos del contexto laboral y los formatos vinculados al programa de estudios.'),
 (46,13,'Sistematiza información utilizando hoja de cálculo de manera eficiente, vinculados al programa de estudios.'),
 (47,13,'Realiza presentaciones de información sistematizada de calidad y vinculados al programa de estudios.'),
 (48,14,'Identifica la arquitectura, componentes y tipos de servidores de datos teniendo en cuenta las especificaciones técnicas del fabricante.'),
 (49,14,'Realiza la instalación de plataformas de softwares de servidores de red y herramientas según los requerimientos del usuario.'),
 (50,14,'Configura las herramientas de administración de servidores según las estrategias de servicios de confiabilidad y seguridad de la información.'),
 (51,14,'Comprueba los servicios de administración de servidores de red de acuerdo al manual de procedimientos y operaciones.'),
 (52,15,'Crea una base de datos usando un sistema de gestor de base de datos en el Modelo ER según requerimientos del diseño establecido por la empresa.'),
 (53,15,'Ejecuta sentencias SQL de manipulación de datos aplicando las reglas relacionales de tablas de manera adecuada.'),
 (54,15,'Utiliza los sistemas de bases de datos NoSQL en el diseño, administración y desarrollo según normas establecidas.'),
 (55,15,'Adquiere el manejo de NoSQL sobre el ecosistema de herramientas Big Data teniendo en cuenta el proceso de la información.'),
 (56,16,'Utiliza herramientas de gestión de incidentes de TI teniendo en cuenta las póliticas de SLA (Acuerdo de Nivel de Servicio).'),
 (57,16,'Genera informes del desempeño de solución de gestión de incidentes de ITIL (Biblioteca de Infraestructura de Tecnologías de Información) basada en SaaS, acorde a la continuidad del negocio.'),
 (58,17,'Identifica los lineamientos y políticas de seguridad informática garantizando la confiabilidad e integridad de la información según las necesidades del usuario.'),
 (59,17,'Realiza ethical hacking completo para garantizar y salvaguardar la información corporativa frente a los ataques informáticos teniendo en cuenta las debilidades de las redes y software.'),
 (60,17,'Implementa planes y soluciones de seguridad que ayuden a minimizar el riesgo de ataques de acuerdo a estándares de seguridad establecidas.'),
 (61,17,'Verifica el funcionamiento adecuado de los equipos para prever fallas de acuerdo a las normas de seguridad.'),
 (62,18,'Utiliza las sentencias y herramientas de la programación en capas de acuerdo a los métodos y etapas de desarrollo.'),
 (63,18,'Diseña aplicaciones informáticas haciendo uso de metodologías y herramientas de acuerdo a los requerimientos del diseño establecido.'),
 (64,18,'Realiza plan de pruebas de las aplicaciones desarrolladas teniendo en cuenta la arquitectura de hardware.'),
 (65,19,'Selecciona la metodología adecuada para el desarrollo de software de acuerdo a las necesidades del cliente.'),
 (66,19,'Soluciona problemas utilizando la metodología de herramientas Case teniendo en cuenta los estándares de diseño.'),
 (67,20,'Maneja aplicaciones multiplataforma utilizando metodologías según las necesidades y requerimientos empresariales'),
 (68,20,'Utiliza las herramientas multiplataforma que facilitan el diseño de aplicaciones según las tecnologías actuales y requerimientos de la empresa.'),
 (69,20,'Implementa aplicaciones con manejo de base de datos teniendo en cuenta las necesidades de la empresa y soluciones pertinentes.'),
 (70,20,'Implanta el sistema de información aplicando pruebas teniendo en cuenta las técnicas de testeo esenciales.'),
 (71,21,'Manipula herramientas gráficas de diseño digital utilizando los software informáticos de diseño.'),
 (72,21,'Diseña ilustraciones gráficas, diagramas, bocetos de forma clara y precisa aplicando técnicas de publicidad.'),
 (73,21,'Edita imágenes, composiciones, fotomontajes digitales adicionando interactividad a objetos y textos de manera efectiva y creativa.'),
 (74,21,'Realiza diseño gráfico para escenarios digitales, impresión u otros integrando la información teniendo en cuenta los requerimientos del usuario final.'),
 (75,22,'Utiliza las etiquetas y estructuras del HTML para realizar la maquetación de páginas según reglas y normas establecidas.'),
 (76,22,'Aplica las hojas de estilo en cascada para realizar la maquetación teniendo en cuenta las reglas y sintaxis de diseño.'),
 (77,22,'Diseña páginas web con HTML, CSS y framework del lado del cliente de acuerdo a los estándares de maquetación de web actuales.'),
 (78,22,'Gestiona los sitios web aplicando las reglas y recomendaciones de la W3C según estándares de desarrollo actual.'),
 (79,23,'Identifica los distintos modelos de negocio online, teniendo en cuenta las tendencias del mercado actual.'),
 (80,23,'Explica las tecnologías existentes para desarrollar un eCommerce, teniendo en cuenta las tendencias del mercado actual.'),
 (81,23,'Desarrolla un plan de Negocio eCommerce, utilizando las tecnologías existentes.'),
 (82,24,'Transmite información personal y grupal, en forma oral y escrita de manera presencial y virtual, aplicando vocabulario y gramática del idioma inglés, en contextos sociales y laborales vinculados al programa de estudios y haciendo uso de las tecnologías.'),
 (83,24,'Expresa conceptos, ideas, sentimientos y hechos de situaciones sociales y laborales en diversos audios en forma clara en idioma inglés, en contextos sociales y laborales vinculados al programa de estudios'),
 (84,24,'Dialoga con diversos interlocutores en medios presenciales y virtuales, en el idioma inglés, con asertividad, sin estereotipos de género u otros, en contextos sociales y laborales al programa de estudios.'),
 (85,25,'Lee de manera comprensiva textos cortos en inglés relacionados a su programa de estudios, extrayendo las ideas principales'),
 (86,25,'Procesa textos cortos en inglés relacionados a su programa de estudios utilizando el vocabulario técnico.'),
 (87,25,'Comunica la información leída de forma oral, aplicando vocabulario y gramática del idioma inglés, en contextos sociales y laborales relacionados al programa de estudios.'),
 (88,26,'Elabora textos escritos básicos utilizando vocabulario técnico vinculado al programa de estudios.'),
 (89,26,'Traduce textos relacionados a su programa de estudios al idioma inglés, con pertinencia contextual y cultural.'),
 (90,27,'Identifica los principios y valores éticos y deontológicos en el marco de sus relaciones sociales y laborales.'),
 (91,27,'Actúa con honestidad, honradez, integridad en su rol como estudiante, fomentando una cultura transparente, orientada a l bien común en su contexto social.'),
 (92,27,'Aplica los códigos de ética en su quehacer profesional de manera autónoma, con responsabilidad haciendo uso eficiente de los recursos.'),
 (93,27,'Actúa correcta y éticamente desde los múltiples roles que como persona asume fomentando una cultura transparente anti corrupción, orientada al bien común y a la ética profesional.'),
 (94,28,'Identifica los principios de la democracia para la optimización de sus relaciones interpersonales.'),
 (95,28,'Establece en acuerdo con otras personas, tareas y objetivos donde se evidencie la inclusión, participación y búsqueda del bien común.'),
 (96,28,'Demuestra respeto por la diversidad y dignidad de las personas en su cotidianeidad.'),
 (97,29,'Utiliza herramientas web del lado del servidor para desarrollar páginas web dinámicas según estándares y requisitos adaptables a diversas acciones del usuario.'),
 (98,29,'Diseña aplicaciones web utilizando el lenguaje de programación actualizado, teniendo en cuenta las diferentes metodologías del desarrollo web.'),
 (99,29,'Implementa plataformas web solidas utilizando librerías y framework según los requerimientos de la empresa.'),
 (100,29,'Gestiona el sistema web utilizando un servicio de hosting y dominio teniendo en cuenta las configuraciones del servidor.'),
 (101,30,'Utiliza las principales herramientas y comandos de software de animación digital, según los requerimientos del usuario.'),
 (102,30,'Aplica modificadores, efectos especiales, librería de materiales sobre el modelo creado para narrar historias creativas, utilizando técnicas de animación.'),
 (103,30,'Utiliza herramientas multimedia para elaborar productos, de acuerdo a los requerimientos del cliente.'),
 (104,30,'Construye una aplicación multimedia interactiva utilizando los criterios técnicos, según las exigencias del mercado.'),
 (105,31,'Maneja herramientas de diseño vectorial y pixel para el proceso de diseño de una gráfica publicitaria creativa, según plataformas del diseño publicitario.'),
 (106,31,'Crea mensajes gráficos partiendo de la investigación, integrando herramientas digitales teniendo en cuenta los requerimientos de la empresa.'),
 (107,31,'Diseña proyecto gráfico editorial de una revista garantizando la calidad del mensaje persuasivo teniendo en cuenta la comunicación visual publicitaria.'),
 (109,32,'Utiliza las herramientas nativas e hibridas para desarrollar aplicaciones móviles de acuerdo a los avances de la tecnología actual.'),
 (110,32,'Utiliza diferentes componentes y estructuras de marcos de trabajo (frameworks) para el desarrollo de aplicaciones móviles teniendo en cuenta el uso práctico de las aplicaciones.'),
 (111,32,'Diseña aplicaciones móviles en diferentes modelos y arquitecturas de software teniendo en cuenta el uso y aplicación práctica.'),
 (112,32,'Publica las aplicaciones para su puesta en marcha teniendo en cuenta las oportunidades comerciales.'),
 (113,33,'Utiliza herramientas de producción audiovisual según los estándares de la producción y realización.'),
 (114,33,'Realiza actividades de filmación del video aplicando las fases de producción y explotación del producto audiovisual.'),
 (115,33,'Diseña planes de promoción y de explotación de proyectos audiovisuales y multimedia indicando la participación en los festivales y mercados de acuerdo con la tipología de los productos.'),
 (116,34,'Maneja herramientas de desarrollo de aplicaciones web en FrontEnd y el BackEnd según los requerimientos y estándares de diseño.'),
 (117,34,'Diseña aplicaciones web implementando patrones de contenido según requerimiento del usuario respetando los derechos de licencia.'),
 (118,34,'Gestiona el sistema web utilizando un servicio de hosting y dominio teniendo en cuenta las configuraciones del servidor.'),
 (119,34,'Configura el posicionamiento de la aplicación web aplicando estrategias SEO, según los requerimientos de la empresa.'),
 (120,35,'Utiliza las herramientas de desarrollo (IDE) en función al tipo de proforma en el desarrollo de aplicaciones móviles teniendo en cuenta el entorno adecuado para su implantación.'),
 (121,35,'Desarrolla criterios de diseño de interfaces de usuario aplicando los métodos u operaciones propias del lenguaje de programación.'),
 (122,35,'Construye aplicaciones móviles de productividad con base de datos locales según reglas de diseño.'),
 (123,35,'Implementa aplicaciones soportadas por sistemas de geolocalización, tomando en cuenta los criterios correspondientes y las buenas prácticas de la programación.'),
 (124,36,'Identifica herramientas de sistemas empresariales teniendo en cuenta el planteamiento estratégico y gestión empresarial.'),
 (125,36,'Explica las etapas de la implementación de soluciones integradas de software y sistemas informáticos acorde a los estándares internacionales.'),
 (126,36,'Analiza los principales factores críticos en la implementación de software empresarial teniendo en cuenta escenarios empresariales.'),
 (127,36,'Explica las soluciones empresariales a través del análisis de las tecnologías de hardware y software, teniendo en cuenta los escenarios empresariales.'),
 (128,37,'Describe problemas de su área, considerando sus características y efectos.'),
 (129,37,'Caracteriza las causas y consecuencias de situaciones o problemas del área de desempeño, analizando la información disponible.'),
 (130,38,'Selecciona las herramientas, considerando el problema identificado y su eficacia de acción.'),
 (131,38,'Propone alternativas de solución efectiva del problema, teniendo en cuenta hechos, referentes de fuentes bibliográficas y las herramientas de apoyo.'),
 (132,39,'Elabora un plan de negocios de acuerdo al estudios de mercado, a la oferta y demanda, población objetivo, considerando la normativa vigente.'),
 (133,39,'Elabora un plan de producción, organización y financiamiento evaluando la ubicación, fuentes de financiamiento y costos.'),
 (134,39,'Implementa el plan de negocios de manera piloto evaluando el resultado.'),
 (135,40,'Plantea el esquema del proyecto de innovación tecnológica considerando el propósito y solución del problema central identificado.'),
 (136,40,'Diseña un prototipo de la innovación tecnológica aplicada, teniendo en cuenta la metodología, diseños experimentales, sistemas de registro, factores y variables a estudiar.'),
 (137,40,'Propone la transferencia tecnológica a la sociedad evaluando los resultados de la aplicación en el mercado laboral y su funcionalidad teniendo en cuenta la responsabilidad social de las instituciones educativas de Educación superior');
/*!40000 ALTER TABLE `capacidad_logro` ENABLE KEYS */;


--
-- Definition of table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `pk_carrera` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carr_nombre` text DEFAULT NULL,
  PRIMARY KEY (`pk_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrera`
--

/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` (`pk_carrera`,`carr_nombre`) VALUES 
 (1,'COMPUTACIONE E INFORMATICA'),
 (2,'CONTABILIDAD'),
 (4,'VVVVVVVVVVVVVVVV');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;


--
-- Definition of table `competencia_empleabilidad`
--

DROP TABLE IF EXISTS `competencia_empleabilidad`;
CREATE TABLE `competencia_empleabilidad` (
  `pk_competencia_empleabilidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_modulo` int(11) DEFAULT NULL,
  `coem_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_competencia_empleabilidad`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competencia_empleabilidad`
--

/*!40000 ALTER TABLE `competencia_empleabilidad` DISABLE KEYS */;
INSERT INTO `competencia_empleabilidad` (`pk_competencia_empleabilidad`,`fk_modulo`,`coem_descripcion`) VALUES 
 (1,1,'Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.'),
 (2,1,'Comunicación efectiva: Expresar de manera clara conceptos, ideas, sentimientos, hechos y opiniones en forma oral y escrita para comunicarse e interactuar con otras personas en contextos sociales y laborales diversos.'),
 (3,2,'Comunicación efectiva: Expresar de manera clara conceptos, ideas, sentimientos, hechos y opiniones en forma oral y escrita para comunicarse e interactuar con otras personas en contextos sociales y laborales diversos.'),
 (4,2,'Tecnologías de la información: Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.'),
 (5,3,'Inglés.- Comprender y comunicar ideas, cotidianamente, a nivel oral y escrito, así como interactuar en diversas situaciones en idioma inglés, en contextos sociales y laborales.'),
 (6,3,'Ética.- Establecer relaciones con respeto y justicia en los ámbitos personal, colectivo e institucional, contribuyendo a una convivencia democrática, orientada al bien común que considere la diversidad y dignidad de las personas, teniendo en cuenta las consideraciones aplicadas en su contexto laboral.'),
 (7,4,'Solución de problemas.- Identificar situaciones complejas para evaluar posibles soluciones, aplicando un conjunto de herramientas flexibles que conlleven a la atención de una necesidad'),
 (8,4,'Emprendimiento.- Identificar nuevas oportunidades de proyectos o negocios que generen valor y sean sostenibles, gestionando recursos para su funcionamiento con creatividad y ética, articulando acciones que permitan desarrollar innovaciones en la creación de bienes y/o servicios, así como en procesos o productos ya existentes.'),
 (9,4,'Innovación: Desarrollar procedimientos sistemáticos enfocados en la mejora significativa de un proceso o servicio respondiendo a un problema, una necesidad o una oportunidad del sector productivo y educativo, el IES y la sociedad.');
/*!40000 ALTER TABLE `competencia_empleabilidad` ENABLE KEYS */;


--
-- Definition of table `competencia_especifica`
--

DROP TABLE IF EXISTS `competencia_especifica`;
CREATE TABLE `competencia_especifica` (
  `pk_competencia_especifica` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_modulo` int(11) DEFAULT NULL,
  `coes_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_competencia_especifica`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competencia_especifica`
--

/*!40000 ALTER TABLE `competencia_especifica` DISABLE KEYS */;
INSERT INTO `competencia_especifica` (`pk_competencia_especifica`,`fk_modulo`,`coes_descripcion`) VALUES 
 (1,1,'Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.'),
 (2,2,'Realizar las mejoras, mantenimientos preventivos y acciones correctivas en las infraestructuras y plataformas de TI, de acuerdo al plan de mejoras, gestión de riesgos, continuidad de negocio y políticas de seguridad.'),
 (3,3,'Atender requerimientos, incidentes y problemas de primer nivel, asimismo brindar asistencia a nivel operativo y funcional en la etapa de puesta en marcha de los sistemas o servicios de TI, según los procedimientos internos de atención, diseño del sistema o servicios, plan de implantación y buenas prácticas de TI.'),
 (4,3,'Realizar la puesta en producción de los sistemas de información o servicios de TI, de acuerdo a la planificación efectuada.'),
 (5,4,'Diseñar la arquitectura de infraestructura y plataforma de TI, de acuerdo a la arquitectura de sistemas de información y servicios de TI, buenas prácticas de TI y estándares en el diseño de arquitectura.');
/*!40000 ALTER TABLE `competencia_especifica` ENABLE KEYS */;


--
-- Definition of table `eva_momento`
--

DROP TABLE IF EXISTS `eva_momento`;
CREATE TABLE `eva_momento` (
  `pk_eva_momento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evmo_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_eva_momento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eva_momento`
--

/*!40000 ALTER TABLE `eva_momento` DISABLE KEYS */;
INSERT INTO `eva_momento` (`pk_eva_momento`,`evmo_descripcion`) VALUES 
 (1,'Incio'),
 (2,'Desarrollo'),
 (3,'Cierre'),
 (4,'Incio - Desarrollo'),
 (5,'Incio - Cierre'),
 (6,'Desarrollo - Cierre'),
 (7,'Incio - Desarrollo - Cierre');
/*!40000 ALTER TABLE `eva_momento` ENABLE KEYS */;


--
-- Definition of table `eva_tecnica`
--

DROP TABLE IF EXISTS `eva_tecnica`;
CREATE TABLE `eva_tecnica` (
  `pk_eva_tecnica` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evte_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_eva_tecnica`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eva_tecnica`
--

/*!40000 ALTER TABLE `eva_tecnica` DISABLE KEYS */;
INSERT INTO `eva_tecnica` (`pk_eva_tecnica`,`evte_descripcion`) VALUES 
 (1,'Observación directa y sistemática'),
 (2,'Análisis de producción de los estudiantes '),
 (3,'Intercambios orales con los estudiantes ');
/*!40000 ALTER TABLE `eva_tecnica` ENABLE KEYS */;


--
-- Definition of table `eva_tecnica_instrumento`
--

DROP TABLE IF EXISTS `eva_tecnica_instrumento`;
CREATE TABLE `eva_tecnica_instrumento` (
  `pk_eva_tecnica_instrumento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_eva_tecnica` varchar(45) DEFAULT NULL,
  `etin_descripcion` text DEFAULT NULL,
  PRIMARY KEY (`pk_eva_tecnica_instrumento`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eva_tecnica_instrumento`
--

/*!40000 ALTER TABLE `eva_tecnica_instrumento` DISABLE KEYS */;
INSERT INTO `eva_tecnica_instrumento` (`pk_eva_tecnica_instrumento`,`fk_eva_tecnica`,`etin_descripcion`) VALUES 
 (1,'1','Rubrica'),
 (2,'1','Escalas'),
 (3,'1','Listas de control'),
 (4,'1','Registro anecdotario'),
 (5,'1','Lista de cotejo'),
 (6,'2','Ficha de metacognición'),
 (7,'2','Resúmenes'),
 (8,'2','Trabajos'),
 (9,'2','Cuadernos de clase'),
 (10,'2','Resolución de ejercicios y problemas'),
 (11,'2','Pruebas orales'),
 (12,'2','Motrices'),
 (13,'2','Plásticas'),
 (14,'2','Musicales'),
 (15,'3','Entrevista'),
 (16,'3','Diálogo'),
 (17,'3','Puesta en común'),
 (18,'3','Grabaciones'),
 (19,'3','Observación externa'),
 (20,'3','Cuestionario');
/*!40000 ALTER TABLE `eva_tecnica_instrumento` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `pk_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu_menu_grupo_fk` tinyint(4) DEFAULT NULL,
  `menu_nombre` text DEFAULT NULL,
  `menu_descripcion` text DEFAULT NULL,
  `menu_id` varchar(45) DEFAULT NULL,
  `menu_icono` text DEFAULT NULL,
  `menu_tamano` varchar(45) DEFAULT NULL,
  `menu_orden` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`pk_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`pk_menu`,`menu_menu_grupo_fk`,`menu_nombre`,`menu_descripcion`,`menu_id`,`menu_icono`,`menu_tamano`,`menu_orden`) VALUES 
 (1,1,'Arquitectura de Plataforma',NULL,'menu_bt_1','fa-solid-desktop',NULL,NULL),
 (2,1,'Contabilidad',NULL,'menu_bt_2','fa-solid-calculator',NULL,NULL),
 (3,1,'Enfermeria Tecnica',NULL,'menu_bt_3','fa-solid-procedures',NULL,NULL),
 (4,1,'Mecatronica Automotriz',NULL,'menu_bt_4','fa-solid-taxi',NULL,NULL),
 (5,1,'Guia Oficial de Turismo',NULL,'menu_bt_5','fa-solid-plane',NULL,NULL),
 (6,1,'Producción Agropecuaria',NULL,'menu_bt_6','fa-solid-seedling',NULL,NULL),
 (7,1,'Electrotecnia Industrial',NULL,'menu_bt_7','fa-solid-bolt',NULL,NULL),
 (8,1,'Electronica',NULL,'menu_bt_8','fa-solid-microchip',NULL,NULL),
 (9,2,'Unidades Didacticas',NULL,'menu_bt_udus','fa-solid-book',NULL,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `menu_grupo`
--

DROP TABLE IF EXISTS `menu_grupo`;
CREATE TABLE `menu_grupo` (
  `pk_menu_grupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `megr_nombre` varchar(45) DEFAULT NULL,
  `megr_orden` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`pk_menu_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_grupo`
--

/*!40000 ALTER TABLE `menu_grupo` DISABLE KEYS */;
INSERT INTO `menu_grupo` (`pk_menu_grupo`,`megr_nombre`,`megr_orden`) VALUES 
 (1,'PROGRAMAS DE ESTUDIO',2),
 (2,'ACTIVIDADES DE APRENDIZAJE',1);
/*!40000 ALTER TABLE `menu_grupo` ENABLE KEYS */;


--
-- Definition of table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `pk_modulo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_carrera` int(10) unsigned DEFAULT NULL,
  `modu_nombre` text DEFAULT NULL,
  PRIMARY KEY (`pk_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modulo`
--

/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` (`pk_modulo`,`fk_carrera`,`modu_nombre`) VALUES 
 (1,1,'Control de los sistemas y servicios de TI.'),
 (2,1,'Mantenimiento de infraestructuras y plataformas de TI'),
 (3,1,'Administración de plataformas y sistemas de TI.'),
 (4,1,'Diseño de arquitecturas de infraestructuras y plataformas de TI.');
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;


--
-- Definition of table `sesion`
--

DROP TABLE IF EXISTS `sesion`;
CREATE TABLE `sesion` (
  `pk_sesion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_ud` int(10) unsigned DEFAULT NULL,
  `sesi_orden` int(11) DEFAULT NULL,
  `sesi_docente` text DEFAULT NULL,
  `sesi_anio` int(10) unsigned DEFAULT NULL,
  `sesi_periodo` varchar(15) DEFAULT NULL,
  `sesi_horas` int(11) DEFAULT NULL,
  `sesi_hora_sincrona` varchar(15) DEFAULT NULL,
  `sesi_hora_asincrona` varchar(15) DEFAULT NULL,
  `sesi_carrera` text DEFAULT NULL,
  `fks_competencia_especifica` varchar(45) DEFAULT NULL,
  `sesi_comp_especifica` text DEFAULT NULL,
  `fks_competencia_empleabilidad` varchar(45) DEFAULT NULL,
  `sesi_comp_empleabilidad` text DEFAULT NULL,
  `fk_modulo` int(11) DEFAULT NULL,
  `sesi_modulo` text DEFAULT NULL,
  `sesi_ud` text DEFAULT NULL,
  `fks_capacidad` varchar(45) DEFAULT NULL,
  `sesi_capacidad` text DEFAULT NULL,
  `fks_capacidad_logro` varchar(45) DEFAULT NULL,
  `sesi_capacidad_logro` text DEFAULT NULL,
  `sesi_tema` text DEFAULT NULL,
  `sesi_act_practico` tinyint(1) DEFAULT NULL,
  `sesi_act_teopractico` tinyint(1) DEFAULT NULL,
  `sesi_tipo_presencial` tinyint(1) DEFAULT NULL,
  `sesi_tipo_virtsincrono` tinyint(1) DEFAULT NULL,
  `sesi_tipo_virtasincrono` tinyint(1) DEFAULT NULL,
  `sesi_fecha` date DEFAULT NULL,
  `plap_indicador_competencia` text DEFAULT NULL,
  `plap_indicador_capacidad` text DEFAULT NULL,
  `plap_logro_sesion` text DEFAULT NULL,
  `inicio_estrategia` text DEFAULT NULL,
  `desarrollo_estrategia` text DEFAULT NULL,
  `cierre_estrategia` text DEFAULT NULL,
  `eva_indicador_logro` text DEFAULT NULL,
  `fk_eva_tecnica` int(11) DEFAULT NULL,
  `eva_tecnicas` text DEFAULT NULL,
  `fk_eva_tecnica_instrumento` int(11) DEFAULT NULL,
  `eva_instrumentos` text DEFAULT NULL,
  `eva_peso` text DEFAULT NULL,
  `eva_momento` text DEFAULT NULL,
  `biblio_docente` text DEFAULT NULL,
  `biblio_estudiante` text DEFAULT NULL,
  PRIMARY KEY (`pk_sesion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sesion`
--

/*!40000 ALTER TABLE `sesion` DISABLE KEYS */;
INSERT INTO `sesion` (`pk_sesion`,`fk_usuario`,`fk_ud`,`sesi_orden`,`sesi_docente`,`sesi_anio`,`sesi_periodo`,`sesi_horas`,`sesi_hora_sincrona`,`sesi_hora_asincrona`,`sesi_carrera`,`fks_competencia_especifica`,`sesi_comp_especifica`,`fks_competencia_empleabilidad`,`sesi_comp_empleabilidad`,`fk_modulo`,`sesi_modulo`,`sesi_ud`,`fks_capacidad`,`sesi_capacidad`,`fks_capacidad_logro`,`sesi_capacidad_logro`,`sesi_tema`,`sesi_act_practico`,`sesi_act_teopractico`,`sesi_tipo_presencial`,`sesi_tipo_virtsincrono`,`sesi_tipo_virtasincrono`,`sesi_fecha`,`plap_indicador_competencia`,`plap_indicador_capacidad`,`plap_logro_sesion`,`inicio_estrategia`,`desarrollo_estrategia`,`cierre_estrategia`,`eva_indicador_logro`,`fk_eva_tecnica`,`eva_tecnicas`,`fk_eva_tecnica_instrumento`,`eva_instrumentos`,`eva_peso`,`eva_momento`,`biblio_docente`,`biblio_estudiante`) VALUES 
 (1,1,3,3,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.\n','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.\n',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.\n','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.\n','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad dentro de la programacion orientado a objetos en el lenguajes de programacion java.',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','50%','Cierre','',''),
 (2,1,13,0,'ADMINISTRADOR PRINCIPAL',2022,'I',0,'0','0','Arquitectura de Plataforma','3','Atender requerimientos, incidentes y problemas de primer nivel, asimismo brindar asistencia a nivel operativo y funcional en la etapa de puesta en marcha de los sistemas o servicios de TI, según los procedimientos internos de atención, diseño del sistema o servicios, plan de implantación y buenas prácticas de TI.','5','Inglés.- Comprender y comunicar ideas, cotidianamente, a nivel oral y escrito, así como interactuar en diversas situaciones en idioma inglés, en contextos sociales y laborales.',3,'Administración de plataformas y sistemas de TI.','Administración de servidores','14','Administrar la infraestructura de servidores de redes y servicios de comunicaciones de acuerdo al manual de procedimientos y operaciones.','48','Identifica la arquitectura, componentes y tipos de servidores de datos teniendo en cuenta las especificaciones técnicas del fabricante.','',0,1,1,0,0,'2022-05-07','Identifica la arquitectura, componentes y tipos de servidores de datos teniendo en cuenta las especificaciones técnicas del fabricante.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (3,1,3,4,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.\n','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.\n',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.\n','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.\n','MODALIDADES Y TIPOS DE CONTRATOS DE TRABAJO.',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (4,1,3,5,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.\n','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.\n',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.\n','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.\n','INTRODUCCIÓN A LA ARQUITECTURA DEL COMPUTADOR',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (5,1,3,1,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (6,1,3,2,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','Sin tema',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (7,1,3,0,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','Sin tema',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (8,1,3,0,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','Sin tema',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','',''),
 (9,1,3,0,'ADMINISTRADOR PRINCIPAL',2022,'I',3,'180','0','Arquitectura de Plataforma','1','Ejecutar acciones de monitoreo y otras acciones operativas programadas, de acuerdo a las buenas prácticas de aseguramiento de operación del CPD y salvaguarda de la información del negocio.','1','Tecnologías de la información.- Manejar herramientas informáticas de las TIC para buscar y analizar información, comunicarse y realizar procedimientos o tareas vinculados al área profesional, de acuerdo con los requerimientos de su entorno laboral.',1,'Control de los sistemas y servicios de TI.','Sistemas operativos','3','Configurar los sistemas operativos, según manuales técnicos y políticas de seguridad.','9','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','Sin tema',0,1,1,0,0,'2022-05-07','Realiza la instalación de distribuciones de sistemas operativos según las necesidades y aspectos legales de la empresa.','','','Actividad focal introductoria.','Organizador visual.','Síntesis, reflexión de los aprendizajes.','',1,'Observación directa y sistemática',5,'Lista de cotejo','100%','Cierre','','');
/*!40000 ALTER TABLE `sesion` ENABLE KEYS */;


--
-- Definition of table `sesion_actividad`
--

DROP TABLE IF EXISTS `sesion_actividad`;
CREATE TABLE `sesion_actividad` (
  `pk_sesion_actividad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_sesion` int(10) unsigned DEFAULT NULL,
  `seac_momento` varchar(20) DEFAULT NULL,
  `seac_actividad` text DEFAULT NULL,
  `seac_recurso` text DEFAULT NULL,
  `seac_recurso_icono` varchar(45) DEFAULT NULL,
  `seac_tiempo` text DEFAULT NULL,
  PRIMARY KEY (`pk_sesion_actividad`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sesion_actividad`
--

/*!40000 ALTER TABLE `sesion_actividad` DISABLE KEYS */;
INSERT INTO `sesion_actividad` (`pk_sesion_actividad`,`fk_sesion`,`seac_momento`,`seac_actividad`,`seac_recurso`,`seac_recurso_icono`,`seac_tiempo`) VALUES 
 (1,1,'inicio','<p><strong>Conflicto cognitivo</strong></p>\n<p>&iquest;C&oacute;mo es que las <strong>computadoras</strong> funcionan?</p>','Zoom','212121212.jpg','32'),
 (5,1,'desarrollo','<p>sdsad<span style=\"color: #ff6600;\">asdsad</span></p>','Zoom','212121212.jpg','12'),
 (7,1,'desarrollo','asdsadsad','Google Form','212121212.jpg','12'),
 (8,1,'cierre','<p>dsasadsadsda</p>\n<p>sadsad</p>\n<p>sadsad</p>','Moodle','212121212.jpg','12'),
 (10,1,'inicio','<p><strong>Recojo de saberes previos</strong>:</p>\n<p>&iquest;Conoces las partes de una computadora?</p>\n<p><em>&iquest;Cu&aacute;l es el uso que le das a tu computadora?</em></p>','Otros','212121212.jpg','223'),
 (11,1,'inicio','<p><strong>Motivaci&oacute;n</strong></p>\n<p>Se presenta un video acerca de que es una computadora y c&oacute;mo funciona.</p>\n<p><a href=\"https://youtu.be/xL8C5CIxDts\">https://youtu.be/xL8C5CIxDts</a></p>','DOCX','212121212.jpg','3'),
 (13,1,'cierre','<p>fdsf dsfdsfdsf</p>','PPT','212121212.jpg','323'),
 (14,2,'inicio','<p>sdsdsdsdsd</p>','Otros','212121212.jpg',''),
 (15,2,'inicio','<p>sdsdsdsd</p>','Otros','212121212.jpg',''),
 (16,2,'inicio','<p>sdsdsd</p>','Otros','212121212.jpg',''),
 (17,2,'desarrollo','<p>qwqwqw</p>','Otros','212121212.jpg',''),
 (18,2,'cierre','<p>qwqwqw</p>','Otros','212121212.jpg','');
/*!40000 ALTER TABLE `sesion_actividad` ENABLE KEYS */;


--
-- Definition of table `sesion_recurso`
--

DROP TABLE IF EXISTS `sesion_recurso`;
CREATE TABLE `sesion_recurso` (
  `pk_sesion_recurso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sere_descripcion` text DEFAULT NULL,
  `sere_icono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pk_sesion_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sesion_recurso`
--

/*!40000 ALTER TABLE `sesion_recurso` DISABLE KEYS */;
INSERT INTO `sesion_recurso` (`pk_sesion_recurso`,`sere_descripcion`,`sere_icono`) VALUES 
 (1,'Otros','212121212.jpg'),
 (2,'Zoom','212121212.jpg'),
 (3,'PDF','212121212.jpg'),
 (4,'PPT','212121212.jpg'),
 (5,'DOCX','212121212.jpg'),
 (6,'XLSX','212121212.jpg'),
 (7,'Moodle','212121212.jpg'),
 (8,'Google Form','212121212.jpg'),
 (9,'Padlet','212121212.jpg'),
 (10,'Youtube','212121212.jpg');
/*!40000 ALTER TABLE `sesion_recurso` ENABLE KEYS */;


--
-- Definition of table `ud`
--

DROP TABLE IF EXISTS `ud`;
CREATE TABLE `ud` (
  `pk_ud` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_carrera` int(11) DEFAULT NULL,
  `fk_modulo` int(10) unsigned DEFAULT NULL,
  `ud_tipo` varchar(45) DEFAULT NULL,
  `ud_nombre` text DEFAULT NULL,
  `ud_semestre` varchar(15) DEFAULT NULL,
  `ud_horas` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`pk_ud`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ud`
--

/*!40000 ALTER TABLE `ud` DISABLE KEYS */;
INSERT INTO `ud` (`pk_ud`,`fk_carrera`,`fk_modulo`,`ud_tipo`,`ud_nombre`,`ud_semestre`,`ud_horas`) VALUES 
 (1,1,1,'especifica','Arquitectura de hardware y soporte técnico','I',NULL),
 (2,1,1,'especifica','Diseño de redes de comunicación','I',6),
 (3,1,1,'especifica','Sistemas operativos','I',3),
 (4,1,1,'especifica','Centros de procesamiento de datos','I',NULL),
 (5,1,1,'empleabilidad','Comunicación oral','I',NULL),
 (6,1,1,'empleabilidad','Aplicaciones en internet','I',NULL),
 (7,1,2,'especifica','Arquitectura y diseño de redes','II',NULL),
 (8,1,2,'especifica','Mantenimiento de equipos informáticos','II',NULL),
 (9,1,2,'especifica','Modelamiento de bases de datos','II',NULL),
 (10,1,2,'especifica','Programación orientada a objetos','II',NULL),
 (11,1,2,'empleabilidad','Interpretación y producción de textos','II',NULL),
 (12,1,2,'empleabilidad','Ofimática','II',NULL),
 (13,1,3,'especifica','Administración de servidores','III',NULL),
 (14,1,3,'especifica','Gestión de bases de datos','III',NULL),
 (15,1,3,'especifica','Organización de recursos TI','III',NULL),
 (16,1,3,'especifica','Ciberseguridad','IV',NULL),
 (17,1,3,'especifica','Herramientas de programación','III',NULL),
 (18,1,3,'especifica','Metodologías de desarrollo de software','III',NULL),
 (19,1,3,'especifica','Proyecto de desarrollo de software','IV',NULL),
 (20,1,3,'especifica','Herramientas de diseño gráfico','IV',NULL),
 (21,1,3,'especifica','Arquitectura de entornos web','IV',NULL),
 (22,1,3,'especifica','Plataformas digitales','IV',NULL),
 (23,1,3,'empleabilidad','Inglés para la comunicación oral','III',NULL),
 (24,1,3,'empleabilidad','Comprensión y redacción en inglés','IV',NULL),
 (25,1,3,'empleabilidad','Comportamiento ético','VI',NULL),
 (26,1,4,'especifica','Programación web','V',NULL),
 (27,1,4,'especifica','Desarrollo multimedia','V',NULL),
 (28,1,4,'especifica','Gráfica publicitaria','V',NULL),
 (29,1,4,'especifica','Arquitectura de aplicaciones móviles','V',NULL),
 (30,1,4,'especifica','Desarrollo audiovisual','VI',NULL),
 (31,1,4,'especifica','Proyecto de aplicaciones web','VI',NULL),
 (32,1,4,'especifica','Proyecto de aplicaciones móviles','VI',NULL),
 (33,1,4,'especifica','Desarrollo de soluciones empresariales','VI',NULL),
 (34,1,4,'empleabilidad','Solución de problemas','V',NULL),
 (35,1,4,'empleabilidad','Plan de negocios','V',NULL),
 (36,1,4,'empleabilidad','Innovación tecnológica','VI',NULL);
/*!40000 ALTER TABLE `ud` ENABLE KEYS */;


--
-- Definition of table `ud_usuario`
--

DROP TABLE IF EXISTS `ud_usuario`;
CREATE TABLE `ud_usuario` (
  `pk_ud_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(10) unsigned DEFAULT NULL,
  `fk_ud` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`pk_ud_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ud_usuario`
--

/*!40000 ALTER TABLE `ud_usuario` DISABLE KEYS */;
INSERT INTO `ud_usuario` (`pk_ud_usuario`,`fk_usuario`,`fk_ud`) VALUES 
 (12,1,3),
 (13,1,13);
/*!40000 ALTER TABLE `ud_usuario` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `pk_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usua_usuario` text DEFAULT NULL,
  `usua_login` varchar(45) DEFAULT NULL,
  `usua_password` varchar(45) DEFAULT NULL,
  `usua_estado` varchar(1) DEFAULT NULL,
  `usua_tipo` varchar(1) DEFAULT NULL,
  `usua_privilegios` text DEFAULT NULL,
  `usua_fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`pk_usuario`,`usua_usuario`,`usua_login`,`usua_password`,`usua_estado`,`usua_tipo`,`usua_privilegios`,`usua_fecha_creacion`) VALUES 
 (1,'ADMINISTRADOR PRINCIPAL','admin','D033E22AE348AEB5660FC2140AEC35850C4DA997','2','2','1,2,3,9','2022-02-18 09:53:52'),
 (68,'JOSE CARLOS SALAZAR','juan','6216F8A75FD5BB3D5F22B6F9958CDEDE3FC086C2','1','1','1,2,3,4,5,6,7,8,9,10,11,12,13,14','2022-02-18 09:41:48'),
 (69,'JUAN PEREZ','juan','40BD001563085FC35165329EA1FF5C5ECBDBBEEF','2','1','1,2,3,14','2022-02-18 09:53:52');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
