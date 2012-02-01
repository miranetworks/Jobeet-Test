
-----------------------------------------------------------------------------
-- jobeet_category
-----------------------------------------------------------------------------

DROP TABLE "jobeet_category" CASCADE;


CREATE TABLE "jobeet_category"
(
	"id" serial  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "jobeet_category" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- jobeet_category_i18n
-----------------------------------------------------------------------------

DROP TABLE "jobeet_category_i18n" CASCADE;


CREATE TABLE "jobeet_category_i18n"
(
	"id" INTEGER  NOT NULL,
	"culture" VARCHAR(7)  NOT NULL,
	"name" VARCHAR(255)  NOT NULL,
	"slug" VARCHAR(255)  NOT NULL,
	PRIMARY KEY ("id","culture")
);

COMMENT ON TABLE "jobeet_category_i18n" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- jobeet_job
-----------------------------------------------------------------------------

DROP TABLE "jobeet_job" CASCADE;


CREATE TABLE "jobeet_job"
(
	"id" serial  NOT NULL,
	"category_id" INTEGER  NOT NULL,
	"type" VARCHAR(255),
	"company" VARCHAR(255)  NOT NULL,
	"logo" VARCHAR(255),
	"url" VARCHAR(255),
	"position" VARCHAR(255)  NOT NULL,
	"location" VARCHAR(255)  NOT NULL,
	"description" TEXT  NOT NULL,
	"how_to_apply" TEXT  NOT NULL,
	"token" VARCHAR(255)  NOT NULL,
	"is_public" BOOLEAN default 't' NOT NULL,
	"is_activated" BOOLEAN default 'f' NOT NULL,
	"email" VARCHAR(255)  NOT NULL,
	"expires_at" TIMESTAMP  NOT NULL,
	"created_at" TIMESTAMP,
	"updated_at" TIMESTAMP,
	PRIMARY KEY ("id"),
	CONSTRAINT "jobeet_job_U_1" UNIQUE ("token")
);

COMMENT ON TABLE "jobeet_job" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- jobeet_affiliate
-----------------------------------------------------------------------------

DROP TABLE "jobeet_affiliate" CASCADE;


CREATE TABLE "jobeet_affiliate"
(
	"id" serial  NOT NULL,
	"url" VARCHAR(255)  NOT NULL,
	"email" VARCHAR(255)  NOT NULL,
	"token" VARCHAR(255)  NOT NULL,
	"is_active" BOOLEAN default 'f' NOT NULL,
	"created_at" TIMESTAMP,
	PRIMARY KEY ("id"),
	CONSTRAINT "jobeet_affiliate_U_1" UNIQUE ("email")
);

COMMENT ON TABLE "jobeet_affiliate" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- jobeet_category_affiliate
-----------------------------------------------------------------------------

DROP TABLE "jobeet_category_affiliate" CASCADE;


CREATE TABLE "jobeet_category_affiliate"
(
	"category_id" INTEGER  NOT NULL,
	"affiliate_id" INTEGER  NOT NULL,
	PRIMARY KEY ("category_id","affiliate_id")
);

COMMENT ON TABLE "jobeet_category_affiliate" IS '';


SET search_path TO public;
ALTER TABLE "jobeet_category_i18n" ADD CONSTRAINT "jobeet_category_i18n_FK_1" FOREIGN KEY ("id") REFERENCES "jobeet_category" ("id");

ALTER TABLE "jobeet_job" ADD CONSTRAINT "jobeet_job_FK_1" FOREIGN KEY ("category_id") REFERENCES "jobeet_category" ("id");

ALTER TABLE "jobeet_category_affiliate" ADD CONSTRAINT "jobeet_category_affiliate_FK_1" FOREIGN KEY ("category_id") REFERENCES "jobeet_category" ("id") ON DELETE CASCADE;

ALTER TABLE "jobeet_category_affiliate" ADD CONSTRAINT "jobeet_category_affiliate_FK_2" FOREIGN KEY ("affiliate_id") REFERENCES "jobeet_affiliate" ("id") ON DELETE CASCADE;
