from django.db import models
from django.urls import reverse
from hashids import Hashids
import datetime


# Create your models here.
class UrlModel(models.Model):
    url = models.URLField()
    code = models.CharField(max_length=8, blank=True)
    created = models.DateField(auto_now_add=True)
    count = models.PositiveBigIntegerField(default=0)

    class Meta:
        verbose_name_plural = "URLs"

    def __str__(self):
        return self.url

    def get_absolute_url(self):
        return reverse("core:redirect", kwargs={"code": self.code})
